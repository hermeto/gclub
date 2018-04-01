/** 
 * Group class.
 */
let group = new function () {

    /**
     * Process method.
     */
    this.process = function () {
        $.ajax({
            url: '/process/validate/',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    window.location = '/group';
                } else {
                    window.location = '/process';
                }
            }
        });
    };

    /**
     * Reset method.
     */
    this.reset = function () {
        if (confirm('Do you want to restart the group process?')) {
            window.location = '/process/reset';
        }
    };

    /**
     * Redirect to geral.
     */
    this.ranking = function () {
        window.location = '/geral';
    };

    /**
     * Redirect to home
     */
    this.home = function () {
        window.location = '/';
    };
};
