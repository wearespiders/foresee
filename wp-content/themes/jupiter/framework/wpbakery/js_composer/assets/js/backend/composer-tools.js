(function ($) {
    $.log = function (text) {
        if (typeof(window.console) !== 'undefined' && window.console.log) window.console.log(text);
    };
    $.expr[':'].containsi = function (a, i, m) {
        return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };

    window.vc_get_column_size = function ($column) {
        if ($column.hasClass("vc_span12")) //full-width
            return "1/1";
        else if ($column.hasClass("vc_span11")) //three-fourth
            return "11/12";
        else if ($column.hasClass("vc_span10")) //three-fourth
            return "4/6";
        else if ($column.hasClass("vc_span9")) //three-fourth
            return "3/4";
        else if ($column.hasClass("vc_span8")) //three-fourth
            return "5/6";
        else if ($column.hasClass("vc_span8")) //two-third
            return "2/3";
        else if ($column.hasClass("vc_span7")) // 7/12
            return "7/12";
        else if ($column.hasClass("vc_span6")) //one-half
            return "1/2";
        else if ($column.hasClass("vc_span5")) //one-half
            return "5/12";
        else if ($column.hasClass("vc_span4")) // one-third
            return "1/3";
        else if ($column.hasClass("vc_span3")) // one-fourth
            return "1/4";
        else if ($column.hasClass("vc_span2")) // one-fourth
            return "1/6";
        else if ($column.hasClass("vc_span1")) // one-fourth
            return "1/12";
        else
            return false;
    };
})(window.jQuery);


function vc_convert_column_size(width) {
    var prefix = 'vc_span',
        numbers = width ? width.split('/') : [1,1],
        range = _.range(1,13),
        num = !_.isUndefined(numbers[0]) && _.indexOf(range, parseInt(numbers[0], 10)) >=0 ? parseInt(numbers[0], 10) : false,
        dev = !_.isUndefined(numbers[1]) && _.indexOf(range, parseInt(numbers[1], 10)) >=0 ? parseInt(numbers[1], 10) : false;
    if(num!==false && dev!==false) {
        return prefix + (12*num/dev);
    }
    return prefix + '12';
}
/**
 * @deprecated
 * @param width
 * @return {*}
 */
function vc_column_size(width) {
    return vc_convert_column_size(width);
}
function vc_convert_column_span_size(width) {
    width = width.replace(/^vc_/, '');
    if (width == "span12")
        return '1/1';
    else if (width == "span11")
        return '11/12';
    else if (width == "span10") //three-fourth
        return '5/6';
    else if (width == "span9") //three-fourth
        return '3/4';
    else if (width == "span8") //two-third
        return '2/3';
    else if (width == "span7")
        return '7/12';
    else if (width == "span6") //one-half
        return '1/2';
    else if (width == "span5") //one-half
        return '5/12';
    else if (width == "span4") // one-third
        return '1/3';
    else if (width == "span3") // one-fourth
        return '1/4';
    else if (width == "span2") // one-fourth
        return '1/6';
    else if(width == "span1")
        return '1/12';

    return false;
}

function vc_get_column_mask(cells) {
    var columns = cells.split('_'),
        columns_count = columns.length,
        numbers_sum = 0,
        i;
        if(columns == '') { columns = 12;}
        //console.log(columns);
    for(i in columns) {
        var sp = columns[i].match(/(\d{1,2})(\d{1,2})/);
        numbers_sum += _.reduce(sp.slice(1), function(memo, num) {
            return memo + parseInt(num, 10);}, 0); //TODO: jshint
    }
    return columns_count + '' + numbers_sum;
}

/**
 * Create Unique id for records in storage.
 * Generate a pseudo-GUID by concatenating random hexadecimal.
 * @return {String}
 */
function vc_guid() {
    return (VCS4() + VCS4() + "-" + VCS4());
}

// Generate four random hex digits.
function VCS4() {
    return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
}

/**
 * Taxonomies filter
 *
 * Show or hide taxonomies depending on selected post types

 * @param $element - post type checkbox object
 * @param $object -
 */
var wpb_grid_post_types_for_taxonomies_handler = function () {
    var $labels = this.$content.find('.wpb_el_type_taxonomies label[data-post-type]'),
        $ = jQuery;
    $labels.hide();
    $('.grid_posttypes:checkbox', this.$content).change(function () {
        if ($(this).is(':checked')) {
            $labels.filter('[data-post-type=' + $(this).val() + ']').show();
        } else {
            $labels.filter('[data-post-type=' + $(this).val() + ']').hide();
        }
    }).each(function () {
            if ($(this).is(':checked')) $labels.filter('[data-post-type=' + $(this).val() + ']').show();
        });
};
var wpb_single_image_img_link_dependency_callback = function () {
    var $img_link_large = this.$content.find('#img_link_large-yes'),
        $ = jQuery,
        $img_link_target = this.$content.find('[name=img_link_target]').closest('.vc_row-fluid');
    this.$content.find('#img_link_large-yes').change(function () {
        var checked = $(this).is(':checked');
        if (checked) {
            $img_link_target.show();
        } else {
            if ($('.wpb-edit-form [name=img_link]').val().length > 0) {
                $img_link_target.show();
            } else {
                $img_link_target.hide();
            }
        }
    });
    if (this.$content.find('#img_link_large-yes').is(':checked')) {
        $img_link_target.show();
    } else {
        if ($('.wpb-edit-form [name=img_link]').val().length > 0) {
            $img_link_target.show();
        } else {
            $img_link_target.hide();
        }
    }
};


var vc_wpnop = function(content) {
    var blocklist1, blocklist2, preserve_linebreaks = false, preserve_br = false;

    // Protect pre|script tags
    if ( content.indexOf('<pre') != -1 || content.indexOf('<script') != -1 ) {
        preserve_linebreaks = true;
        content = content.replace(/<(pre|script)[^>]*>[\s\S]+?<\/\1>/g, function(a) {
            a = a.replace(/<br ?\/?>(\r\n|\n)?/g, '<wp-temp-lb>');
            return a.replace(/<\/?p( [^>]*)?>(\r\n|\n)?/g, '<wp-temp-lb>');
        });
    }

    // keep <br> tags inside captions and remove line breaks
    if ( content.indexOf('[caption') != -1 ) {
        preserve_br = true;
        content = content.replace(/\[caption[\s\S]+?\[\/caption\]/g, function(a) {
            return a.replace(/<br([^>]*)>/g, '<wp-temp-br$1>').replace(/[\r\n\t]+/, '');
        });
    }

    // Pretty it up for the source editor
    blocklist1 = 'blockquote|ul|ol|li|table|thead|tbody|tfoot|tr|th|td|div|h[1-6]|p|fieldset';
    content = content.replace(new RegExp('\\s*</('+blocklist1+')>\\s*', 'g'), '</$1>\n');
    content = content.replace(new RegExp('\\s*<((?:'+blocklist1+')(?: [^>]*)?)>', 'g'), '\n<$1>');

    // Mark </p> if it has any attributes.
    content = content.replace(/(<p [^>]+>.*?)<\/p>/g, '$1</p#>');

    // Sepatate <div> containing <p>
    content = content.replace(/<div( [^>]*)?>\s*<p>/gi, '<div$1>\n\n');

    // Remove <p> and <br />
    content = content.replace(/\s*<p>/gi, '');
    content = content.replace(/\s*<\/p>\s*/gi, '\n\n');
    content = content.replace(/\n[\s\u00a0]+\n/g, '\n\n');
    content = content.replace(/\s*<br ?\/?>\s*/gi, '\n');

    // Fix some block element newline issues
    content = content.replace(/\s*<div/g, '\n<div');
    content = content.replace(/<\/div>\s*/g, '</div>\n');
    content = content.replace(/\s*\[caption([^\[]+)\[\/caption\]\s*/gi, '\n\n[caption$1[/caption]\n\n');
    content = content.replace(/caption\]\n\n+\[caption/g, 'caption]\n\n[caption');

    blocklist2 = 'blockquote|ul|ol|li|table|thead|tbody|tfoot|tr|th|td|h[1-6]|pre|fieldset';
    content = content.replace(new RegExp('\\s*<((?:'+blocklist2+')(?: [^>]*)?)\\s*>', 'g'), '\n<$1>');
    content = content.replace(new RegExp('\\s*</('+blocklist2+')>\\s*', 'g'), '</$1>\n');
    content = content.replace(/<li([^>]*)>/g, '\t<li$1>');

    if ( content.indexOf('<hr') != -1 ) {
        content = content.replace(/\s*<hr( [^>]*)?>\s*/g, '\n\n<hr$1>\n\n');
    }

    if ( content.indexOf('<object') != -1 ) {
        content = content.replace(/<object[\s\S]+?<\/object>/g, function(a){
            return a.replace(/[\r\n]+/g, '');
        });
    }

    // Unmark special paragraph closing tags
    content = content.replace(/<\/p#>/g, '</p>\n');
    content = content.replace(/\s*(<p [^>]+>[\s\S]*?<\/p>)/g, '\n$1');

    // Trim whitespace
    content = content.replace(/^\s+/, '');
    content = content.replace(/[\s\u00a0]+$/, '');

    // put back the line breaks in pre|script
    if ( preserve_linebreaks )
        content = content.replace(/<wp-temp-lb>/g, '\n');

    // and the <br> tags in captions
    if ( preserve_br )
        content = content.replace(/<wp-temp-br([^>]*)>/g, '<br$1>');

    return content;
};

var vc_wpautop = function(pee) {
    var preserve_linebreaks = false, preserve_br = false,
        blocklist = 'table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|option|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|noscript|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary';

    if ( pee.indexOf('<object') != -1 ) {
        pee = pee.replace(/<object[\s\S]+?<\/object>/g, function(a){
            return a.replace(/[\r\n]+/g, '');
        });
    }

    pee = pee.replace(/<[^<>]+>/g, function(a){
        return a.replace(/[\r\n]+/g, ' ');
    });

    // Protect pre|script tags
    if ( pee.indexOf('<pre') != -1 || pee.indexOf('<script') != -1 ) {
        preserve_linebreaks = true;
        pee = pee.replace(/<(pre|script)[^>]*>[\s\S]+?<\/\1>/g, function(a) {
            return a.replace(/(\r\n|\n)/g, '<wp-temp-lb>');
        });
    }

    // keep <br> tags inside captions and convert line breaks
    if ( pee.indexOf('[caption') != -1 ) {
        preserve_br = true;
        pee = pee.replace(/\[caption[\s\S]+?\[\/caption\]/g, function(a) {
            // keep existing <br>
            a = a.replace(/<br([^>]*)>/g, '<wp-temp-br$1>');
            // no line breaks inside HTML tags
            a = a.replace(/<[a-zA-Z0-9]+( [^<>]+)?>/g, function(b){
                return b.replace(/[\r\n\t]+/, ' ');
            });
            // convert remaining line breaks to <br>
            return a.replace(/\s*\n\s*/g, '<wp-temp-br />');
        });
    }

    pee = pee + '\n\n';
    pee = pee.replace(/<br \/>\s*<br \/>/gi, '\n\n');
    pee = pee.replace(new RegExp('(<(?:'+blocklist+')(?: [^>]*)?>)', 'gi'), '\n$1');
    pee = pee.replace(new RegExp('(</(?:'+blocklist+')>)', 'gi'), '$1\n\n');
    pee = pee.replace(/<hr( [^>]*)?>/gi, '<hr$1>\n\n'); // hr is self closing block element
    pee = pee.replace(/\r\n|\r/g, '\n');
    pee = pee.replace(/\n\s*\n+/g, '\n\n');
    pee = pee.replace(/([\s\S]+?)\n\n/g, '<p>$1</p>\n');
    pee = pee.replace(/<p>\s*?<\/p>/gi, '');
    pee = pee.replace(new RegExp('<p>\\s*(</?(?:'+blocklist+')(?: [^>]*)?>)\\s*</p>', 'gi'), "$1");
    pee = pee.replace(/<p>(<li.+?)<\/p>/gi, '$1');
    pee = pee.replace(/<p>\s*<blockquote([^>]*)>/gi, '<blockquote$1><p>');
    pee = pee.replace(/<\/blockquote>\s*<\/p>/gi, '</p></blockquote>');
    pee = pee.replace(new RegExp('<p>\\s*(</?(?:'+blocklist+')(?: [^>]*)?>)', 'gi'), "$1");
    pee = pee.replace(new RegExp('(</?(?:'+blocklist+')(?: [^>]*)?>)\\s*</p>', 'gi'), "$1");
    pee = pee.replace(/\s*\n/gi, '<br />\n');
    pee = pee.replace(new RegExp('(</?(?:'+blocklist+')[^>]*>)\\s*<br />', 'gi'), "$1");
    pee = pee.replace(/<br \/>(\s*<\/?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)>)/gi, '$1');
    pee = pee.replace(/(?:<p>|<br ?\/?>)*\s*\[caption([^\[]+)\[\/caption\]\s*(?:<\/p>|<br ?\/?>)*/gi, '[caption$1[/caption]');

    pee = pee.replace(/(<(?:div|th|td|form|fieldset|dd)[^>]*>)(.*?)<\/p>/g, function(a, b, c) {
        if ( c.match(/<p( [^>]*)?>/) )
            return a;

        return b + '<p>' + c + '</p>';
    });

    // put back the line breaks in pre|script
    if ( preserve_linebreaks )
        pee = pee.replace(/<wp-temp-lb>/g, '\n');

    if ( preserve_br )
        pee = pee.replace(/<wp-temp-br([^>]*)>/g, '<br$1>');
    return pee;
};