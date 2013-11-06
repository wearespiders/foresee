/* =========================================================
 * params/all.js v0.0.1
 * =========================================================
 * Copyright 2012 Wpbakery
 *
 * Visual composer javascript functions to enable fields.
 * This script loads with settings form.
 * ========================================================= */

var wpb_change_tab_title, wpb_change_accordion_tab_title;

!function($) {
    wpb_change_tab_title = function($element, field) {
        $('.tabs_controls a[href=#tab-' + $(field).val() +']').text($('.wpb-edit-form [name=title].wpb_vc_param_value').val());
    };
    wpb_change_accordion_tab_title = function($element, field) {
         var $section_title = $element.prev();
         $section_title.find('a').text($(field).val());
    };

    function init_textarea_html($element) {
        /*
         Simple version without all this buttons from Wordpress
         tinyMCE.init({
         mode : "textareas",
         theme: 'advanced',
         editor_selector: $element.attr('name') + '_tinymce'
         });
         */
        var textfield_id = $element.attr("id"),
            $form_line = $element.closest('.edit_form_line'),
            $content_holder = $form_line.find('.vc_textarea_html_content'),
            content = $content_holder.val();

        window.tinyMCEPreInit.mceInit[textfield_id] = _.extend({}, tinyMCEPreInit.mceInit['content']);

        if(_.isUndefined(tinyMCEPreInit.qtInit[textfield_id])) {
            window.tinyMCEPreInit.qtInit[textfield_id] = _.extend({}, tinyMCEPreInit.qtInit['replycontent'], {id: textfield_id})
        }
        quicktags( window.tinyMCEPreInit.qtInit[textfield_id] );
        $element.val($content_holder.val());
        window.switchEditors.go(textfield_id, 'tmce');
    }
    function init_textarea_html_old($element) {
        var textfield_id = $element.attr("id"),
            $form_line = $element.closest('.edit_form_line'),
            $content_holder = $form_line.find('.vc_textarea_html_content');
        $('#' + textfield_id +'-html').trigger('click');
        $('.switch-tmce').trigger('click');
        $form_line.find('.wp-switch-editor').removeAttr("onclick");
         $('.switch-tmce').trigger('click');
         $element.closest('.edit_form_line').find('.switch-tmce').click(function () {
         window.tinyMCE.execCommand("mceAddControl", true, textfield_id);
         window.switchEditors.go(textfield_id, 'tmce');
         $element.closest('.edit_form_line').find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
             var val = window.switchEditors.wpautop($(this).closest('.edit_form_line').find("textarea.visual_composer_tinymce").val());
             $("textarea.visual_composer_tinymce").val(val);
             // Add tinymce
             window.tinyMCE.execCommand("mceAddControl", true, textfield_id);
         });
         $element.closest('.edit_form_line').find('.switch-html').click(function () {
             $element.closest('.edit_form_line').find('.wp-editor-wrap').removeClass('tmce-active').addClass('html-active');
             window.tinyMCE.execCommand("mceRemoveControl", true, textfield_id);
         });
         $('#wpb_tinymce_content-html').trigger('click');
         $('#wpb_tinymce_content-tmce').trigger('click'); // Fix hidden toolbar
    }
    $('.wpb-edit-form .textarea_html').each(function(){
        init_textarea_html($(this));
    });

    $('.vc-color-control').wpColorPicker();

    var InitGalleries = function() {
        var that = this;
        // TODO: Backbone style for view binding
        $('.gallery_widget_attached_images_list', this.$view).unbind('click.removeImage').on('click.removeImage', 'a.icon-remove', function(e){
            e.preventDefault();
            var $block = $(this).closest('.edit_form_line');
            $(this).parent().remove();
            var img_ids = [];
            $block.find('.added img').each(function () {
                img_ids.push($(this).attr("rel"));
            });
            $block.find('.gallery_widget_attached_images_ids').val(img_ids.join(',')).trigger('change');
        });
        $('.gallery_widget_attached_images_list').each(function (index) {
            var $img_ul = $(this);
            $img_ul.sortable({
                forcePlaceholderSize:true,
                placeholder:"widgets-placeholder-gallery",
                cursor:"move",
                items:"li",
                update:function () {
                    var img_ids = [];
                    $(this).find('.added img').each(function () {
                        img_ids.push($(this).attr("rel"));
                    });
                    $img_ul.closest('.edit_form_line').find('.gallery' +
                        '' +
                        '_widget_attached_images_ids').val(img_ids.join(',')).trigger('change');
                }
            });
        });
    };
    new InitGalleries();
    var template_options = {
        evaluate:    /<#([\s\S]+?)#>/g,
        interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
        escape:      /\{\{([^\}]+?)\}\}(?!\})/g
    };

     /**
      * Loop param for shortcode with magic query posts constructor.
      * ====================================
      */
    vc.loop_partial = function(template_name, key, loop, settings) {
        var data = _.isObject(loop) && !_.isUndefined(loop[key]) ? loop[key] : '';
        return _.template($('#_vcl-' + template_name).html(), {name: key, data: data, settings: settings}, template_options);
    };
    vc.loop_field_not_hidden = function(key, loop) {
        return !(_.isObject(loop[key]) && _.isBoolean(loop[key].hidden) && loop[key].hidden === true);
    };
    vc.is_locked = function(data) {
        return _.isObject(data) && _.isBoolean(data.locked) && data.locked === true;
    };

    var Suggester = function(element, options) {
        this.el = element;
        this.$el = $(this.el);
        this.$el_wrap = '';
        this.$block = '';
        this.suggester = '';
        this.selected_items = [];
        this.options = _.isObject(options) ? options : {};
        _.defaults(this.options, {
            css_class: 'vc-suggester',
            limit: false,
            source: {},
            predefined: [],
            locked: false,
            select_callback: function(label, data) {},
            remove_callback: function(label, data) {},
            update_callback: function(label, data) {},
            check_locked_callback: function(el, data) {return false;}
        });
        this.init();
    };

    Suggester.prototype = {
        constructor: Suggester,
        init: function() {
            _.bindAll(this, 'buildSource', 'itemSelected', 'labelClick', 'setFocus', 'resize');
            var that = this;
            this.$el.wrap('<ul class="' + this.options.css_class +'"><li class="input"/></ul>');

            this.$el_wrap = this.$el.parent();
            this.$block = this.$el_wrap.closest('ul').append($('<li class="clear"/>'));
            this.$el.focus(this.resize).blur(function(){
                $(this).parent().width(170);
                $(this).val('');
                });
            this.$block.click(this.setFocus);
            this.suggester = this.$el.data('suggest'); // Remove form here
            this.$el.autocomplete({
                source: this.buildSource,
                select: this.itemSelected,
                minLength: 3,
                focus: function( event, ui ) {return false;}
            }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                return $( '<li data-value="' + item.value + '">' )
                    .append( "<a>" + item.name + "</a>" )
                    .appendTo( ul );
            };
            if(_.isArray(this.options.predefined)) {
                _.each(this.options.predefined, function(item){
                    this.create(item);
                }, this);
            }
        },
        resize: function() {
            var position = this.$el_wrap.position(),
                block_position = this.$block.position();
            this.$el_wrap.width(parseFloat(this.$block.width())  - (parseFloat(position.left) - parseFloat(block_position.left) + 4));
        },
        setFocus: function(e) {
            e.preventDefault();
            var $target = $(e.target);
            if($target.hasClass(this.options.css_class)) {
                this.$el.trigger('focus');
            }
        },
        itemSelected: function(event, ui) {
            this.$el.blur();
            this.create(ui.item);
            this.$el.focus();
            return false;
        },
        create: function(item) {
            var index = (this.selected_items.push(item) - 1),
                remove = this.options.check_locked_callback(this.$el, item) === true ? '' : ' <a class="remove">&times;</a>',
                $label,
                exclude_css = '';
            if(_.isUndefined(this.selected_items[index].action)) this.selected_items[index].action = '+';
            exclude_css = this.selected_items[index].action === '-' ? ' exclude' : ' include';
            $label = $('<li class="vc-suggest-label' + exclude_css +'" data-index="' + index + '" data-value="' + item.value + '"><span class="label">' + item.name + '</span>' + remove + '</li>');
            $label.insertBefore(this.$el_wrap);
            if(!_.isEmpty(remove)) $label.click(this.labelClick);
            this.options.select_callback($label, this.selected_items);
        },
        labelClick: function(e) {
            e.preventDefault();
            var $label = $(e.currentTarget),
                index = parseInt($label.data('index'), 10),
                $target = $(e.target);
            if($target.is('.remove')) {
                delete this.selected_items[index];
                this.options.remove_callback($label, this.selected_items);
                $label.remove();
                return false;
            }
            this.selected_items[index].action = this.selected_items[index].action === '+' ? '-' : '+';
            if(this.selected_items[index].action == '+') {
                $label.removeClass('exclude').addClass('include');
            } else {
                $label.removeClass('include').addClass('exclude');
            }
            this.options.update_callback($label, this.selected_items);
        },
        buildSource: function(request, response) {
            var exclude = _.map(this.selected_items, function(item) {return item.value;}).join(',');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: window.ajaxurl,
                data: {
                    action: 'wpb_get_loop_suggestion',
                    field: this.suggester,
                    exclude: exclude,
                    query: request.term
                }
            }).done(function(data) {
                    response(data);
                });
        }
    };
    $.fn.suggester = function(option) {
            return this.each(function () {
                var $this = $(this),
                    data = $this.data('suggester'),
                    options = _.isObject(option) ? option : {};
                if (!data) $this.data('suggester', (data = new Suggester(this, option)));
                if (typeof option == 'string') data[option]();
            });
    };

    var VcLoopEditorView = Backbone.View.extend({
        className: 'loop_params_holder',
        events: {
            'click input, select': 'save',
            'change input, select': 'save',
            'change :checkbox[data-input]': 'updateCheckbox'
        },
        query_options: {

        },
        return_array: {},
        controller: '',
        initialize: function() {
            _.bindAll(this, 'save', 'updateSuggestion', 'suggestionLocked');
        },
        render: function(controller) {
            var that = this,
                template = _.template($( '#vcl-loop-frame' ).html(), this.model, _.extend({}, template_options, {variable: 'loop'}));
            this.controller = controller;
            this.$el.html(template);
            this.controller.$el.append(this.$el);
            _.each($('[data-suggest]'), function(object){
                var $field = $(object),
                    current_value = window.decodeURIComponent($('[data-suggest-prefill=' + $field.data('suggest') + ']').val());
                $field.suggester({
                    predefined: $.parseJSON(current_value),
                    select_callback: this.updateSuggestion,
                    update_callback: this.updateSuggestion,
                    remove_callback: this.updateSuggestion,
                    check_locked_callback: this.suggestionLocked
                });
            }, this);
            return this;
        },
        show: function() {
            this.$el.slideDown();
        },
        save: function(e) {
            this.return_array = {};
            _.each(this.model, function(value, key){
                var value = this.getValue(key, value);
                if(_.isString(value) && !_.isEmpty(value)) this.return_array[key] = value;
            }, this);
            this.controller.setInputValue(this.return_array);
        },
        getValue: function(key, default_value) {
            var value = $('[name=' + key + ']', this.$el).val();
            return value;
        },
        hide: function() {
            this.$el.slideUp();
        },
        toggle: function() {
            if(!this.$el.is(':animated')) this.$el.slideToggle();
        },
        updateCheckbox: function(e) {
            var $checkbox = $(e.currentTarget),
                input_name = $checkbox.data('input'),
                $input = $('[data-name=' + input_name + ']', this.$el),
                value = [];
            $('[data-input=' + input_name+']:checked').each(function(){
                value.push($(this).val());
            });
            $input.val(value);
        },
        updateSuggestion: function($elem, data) {
            var value,
                $suggestion_block = $elem.closest('[data-block=suggestion]');
            value = _.reduce(data, function(memo, label){
                if(!_.isEmpty(label)) {
                    return memo + (_.isEmpty(memo) ? '' : ',') + (label.action === '-' ? '-' : '') + label.value;
                }
            }, '');
            $suggestion_block.find('[data-suggest-value]').val(value).trigger('change');
        },
        suggestionLocked: function($elem, data) {
            var value = data.value,
                field = $elem.closest('[data-block=suggestion]').find('[data-suggest-value]').data('suggest-value');

            return this.controller.settings[field]
                   && _.isBoolean(this.controller.settings[field].locked)
                   && this.controller.settings[field].locked == true
                   && _.isString(this.controller.settings[field].value)
                   && _.indexOf(this.controller.settings[field].value.replace('-', '').split(/\,/), '' + value) >= 0;
        }
    });
    var VcLoop = Backbone.View.extend({
        events: {
            'click .vc-loop-build': 'showEditor'
        },
        initialize: function() {
            _.bindAll(this, 'createEditor');
            this.$input = $('.wpb_vc_param_value', this.$el);
            this.$button = this.$el.find('.vc-loop-build');
            this.data = this.$input.val();
            this.settings = $.parseJSON(window.decodeURIComponent(this.$button.data('settings')));
        },
        render: function() {
            return this;
        },
        showEditor: function(e) {
            e.preventDefault();
            if(_.isObject(this.loop_editor_view)) {
                this.loop_editor_view.toggle();
                return false;
            }
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: window.ajaxurl,
                data: {
                    action:'wpb_get_loop_settings',
                    value: this.data,
                    settings: this.settings
                }
            }).done(this.createEditor);
        },
        createEditor: function(data) {
            this.loop_editor_view = new VcLoopEditorView({model:!_.isEmpty(data) ? data : {}});
            this.loop_editor_view.render(this).show();
        },
        setInputValue: function(value) {
            this.$input.val(_.map(value, function(value, key){
                return key + ':' + value;
            }).join('|'));
        }
    });
    var VcOptionsField = Backbone.View.extend({
        events: {
            'click .vc-options-edit': 'showEditor',
            'click input, select': 'save',
            'change input, select': 'save',
            'keyup input': 'save'
        },
        data: {},
        fields: {},
        initialize: function() {
            this.$button = this.$el.find('.vc-options-edit');
            this.$form = this.$el.find('.vc-options-fields');
            this.$input = this.$el.find('.wpb_vc_param_value');
            this.settings = this.$form.data('settings');
            this.parseData();
            this.render();
        },
        render: function() {
            var html = '';
            _.each(this.settings, function(field){
                if(!_.isUndefined(this.data[field.name])) {
                    field.value = this.data[field.name];
                } else if(!_.isUndefined(field.value)) {
                    field.value = field.value.split(',');
                    this.data[field.name] = field.value;
                }
                this.fields[field.name] = field;
                if($( '#vcl-options-field-' + field.type).is('script')) {
                    html  += _.template(
                        $( '#vcl-options-field-' + field.type ).html(),
                        $.extend({name: '', label: '', value: [], options: '', description: ''}, field),
                        _.extend({}, template_options)
                    );
                }
            }, this);
            this.$form.html(html);
            return this;
        },
        parseData: function() {
            _.each(this.$input.val().split("|"), function(data) {
                if(data.match(/\:/)) {
                    var split = data.split(':'),
                        name = split[0],
                        value = split[1];
                    this.data[name] = _.map(value.split(','), function(v){
                        return window.decodeURIComponent(v);
                    });
                }
            }, this);
        },
        saveData: function() {
            var data_string = _.map(this.data, function(value, key){
                return key + ':' + _.map(value, function(v){ return window.encodeURIComponent(v);}).join(',');
            }).join('|');
            this.$input.val(data_string);
        },
        showEditor: function() {
            this.$form.slideToggle();
        },
        save: function(e) {
            var $field = $(e.currentTarget)
            if($field.is(':checkbox')) {
                var value = [];
                this.$el.find('input[name=' + $field.attr('name') + ']').each(function(){
                    if($(this).is(':checked')) {
                        value.push($(this).val());
                    }
                });
                this.data[$field.attr('name')] = value;
            } else {
                this.data[$field.attr('name')] = [$field.val()];
            }
            this.saveData();
        }
    });

    $(function(){
        $('.wpb_el_type_loop').each(function(){
            new VcLoop({el: $(this).get(0)});
        });
        $('.wpb_el_type_options').each(function(){
            new VcOptionsField({el: $(this).get(0)});
        });
    });
    /**
     * VC_link power code.
     */
    $('.vc-link-build').click(function(e){
        e.preventDefault();
        var $self = $(this),
            $block = $(this).closest('.vc-link'),
            $input = $block.find('.wpb_vc_param_value'),
            $url_label = $block.find('.url-label'),
            $title_label = $block.find('.title-label'),
            value_object = $input.data('json');
        var $dialog = $('#wp-link').wpdialog({
            title: wpLinkL10n.title,
            width: 480,
            height: 'auto',
            modal: true,
            dialogClass: 'wp-dialog',
            zIndex: 300000
        });
        window.wpLink.textarea = $self;
        if(_.isString(value_object.url)) $('#url-field').val(value_object.url);
        if(_.isString(value_object.title)) $('#link-title-field').val(value_object.title);
        $('#link-target-checkbox').attr('checked', !_.isEmpty(value_object.target) ? true : false);
        $('#wp-link-submit').unbind('click.vcLink').bind('click.vcLink', function(e){
            e.preventDefault();
            var options = {},
                string = '';
            options.url = $('#url-field').val();
            options.title = $('#link-title-field').val();
            options.target = $('#link-target-checkbox').is(':checked') ? ' _blank' : '';
            string = _.map(options, function(value, key){
                if(_.isString(value) && value.length >0) {
                    return key + ':' + encodeURIComponent(value);
                }
            }).join('|');
            $input.val(string);
            $input.data('json', options);
            $url_label.html(options.url + options.target );
            $title_label.html(options.title);
            $dialog.wpdialog('close');
            // remove vc_link hooks for wpLink
            $('#wp-link-submit').unbind('click.vcLink');
            $('#wp-link-cancel').unbind('click.vcLink');
            window.wpLink.textarea = '';
        });
        $('#wp-link-cancel').unbind('click.vcLink').bind('click.vcLink', function(e){
            e.preventDefault();
            $dialog.wpdialog('close');
            // remove vc_link hooks for wpLink
            $('#wp-link-submit').unbind('click.vcLink');
            $('#wp-link-cancel').unbind('click.vcLink');
            window.wpLink.textarea = '';
        });
    });
    var VcSortedList = function(element, settings) {
        this.el = element;
        this.$el = $(this.el);
        this.$data_field = this.$el.find('.wpb_vc_param_value');
        this.$toolbar = this.$el.find('.vc-sorted-list-toolbar');
        this.$current_control = this.$el.find('.vc-sorted-list-container');
        _.defaults(this.options, {});
        this.init();
    };
    VcSortedList.prototype = {
        constructor: VcSortedList,
        init: function() {
            var that = this;
            _.bindAll(this, 'controlEvent', 'save');
            this.$toolbar.on('change', 'input', this.controlEvent);
            var selected_data = this.$data_field.val().split(',');
            for(var i in selected_data) {
                var $control = this.$toolbar.find('[data-element=' + selected_data[i] + ']');
                if($control.is('input')) {
                    $control.prop('checked', true);
                    this.$current_control.append('<li class="vc-control-' + $control.val() + '" data-name="' + $control.val() + '">' + $control.parent().text() + '</li>');
                }
            }
            this.$current_control.sortable({
                stop: this.save
            });
        },
        controlEvent: function(e) {
            var $control = $(e.currentTarget);
            if($control.is(':checked')) {
                this.$current_control.append('<li class="vc-control-' + $control.val() + '" data-name="' + $control.val() + '">' + $control.parent().text() + '</li>');
            } else {
                this.$current_control.find('.vc-control-' + $control.val()).remove();
            }
            this.save();
        },
        save: function() {
            var value = _.map(this.$current_control.find('[data-name]'), function(element){
                return $(element).data('name');
            }).join(',');
            this.$data_field.val(value);
        }
    };
    $.fn.VcSortedList = function(option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('vc_sorted_list'),
                options = _.isObject(option) ? option : {};
            if (!data) $this.data('vc_sorted_list', (data = new VcSortedList(this, option)));
            if (typeof option == 'string') data[option]();
        });
    };
    $('.vc-sorted-list').VcSortedList();
}(window.jQuery);