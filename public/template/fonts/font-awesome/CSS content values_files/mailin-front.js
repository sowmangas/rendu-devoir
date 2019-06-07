jQuery(document).ready(function(){

    // run MA script identify() when submit on any forms with email field
    jQuery('form').on('submit', function(e){
        if(!jQuery(this).hasClass('sib_signup_form')) {
            var email = jQuery(this).find('input[type=email]').val();
            var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (typeof sendinblue != 'undefined' && email != null && emailPattern.test(email)) {
                var postData = jQuery(this).serializeObject();
                sendinblue.identify(email, postData);
            }
        }
    });
});
// get serialized data form subscribe form
jQuery.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    jQuery.each(a, function() {
        if(this.name == 'sib_form_action' || this.name == 'sib_form_id' || this.name == 'email')
            return true; // continue
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
