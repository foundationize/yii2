/* 
 * app.js - Application JS
 */

// Scrolls to section of page if hash included in URL

function scrollToHashLink(hash) {
     //$hashlink = $('a[href="' + hash + '"]');
     $hashlink = $(hash + '-target');
     $('html, body').animate({ scrollTop: $hashlink.offset().top - 20}, 700);
}

function initScrollToHashlink() { // called on doc load
    // on pageload, if there's a #something in URL, scroll to it    
    if (window.location.hash) {
        var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
        scrollToHashLink('#' + hash);
    }
    
    $('.hashlink').click(function () {
        var hash = $(this).attr('href'); 
                 
        // Remove current hash if exists
        if (window.location.hash) {
            var curr_hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
            window.location.href =  window.location.href.replace('#' + curr_hash, '') + hash;
        } else {
            window.location.href =  window.location.href + hash;
        }
        
        scrollToHashLink(hash);
        return false;
    });    
}

// external func to open share window
window.openShareWindow = function(url) {
    window.open(url, 'Sharing', 'menubar=no,width=500,height=500');
    void(0);
};

function initJsSocials() {
    jsSocials.shares["facebook-like"] = {
        label: "Like",
        logo: "fa fa-facebook",
        shareUrl: "https://www.facebook.com/v2.3/plugins/like.php?locale=en_US&share=false&show_faces=true&href={url}",
        countUrl: function() {
            return "https://graph.facebook.com/fql?q=SELECT total_count FROM link_stat WHERE url='" + window.encodeURIComponent(this.url) + "'";
        },
        getCount: function(data) {
            return (data.data.length && data.data[0].total_count) || 0;
        }        
    };
    
    jsSocials.shares["twitter-tweet"] = {
        label: "Tweet",
        logo: "fa fa-twitter",
        shareUrl: "https://twitter.com/intent/tweet?"
        + 'text=' + encodeURIComponent(document.title.replace('|', ''))        
        + '&url={url}',
        countUrl: function() {
            return ''; // counts doesn't work for twitter anymore
        },
        getCount: function(data) {
            return 0;
        }        
    };
    
    //share the social: http://js-socials.com/start-using/
    $("#share").jsSocials({
        _getShareUrl: function() {
            var url = jsSocials.Socials.prototype._getShareUrl.apply(this, arguments);
            return "javascript:window.openShareWindow('" + url + "');";
        },
        shares: ["twitter-tweet", "googleplus", "facebook-like"],        
        showLabel: true,
        showCount: true
    });
    
    // remove target attr
    $("#share").find("a").removeAttr("target");
}


$(document).ready(function() { 
    initScrollToHashlink();    
                
    initJsSocials();    
});



