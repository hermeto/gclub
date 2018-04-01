/**
 * Playoff class.
 */
let playoff = new function () {
    /**
     * Process method.
     */
    this.process = function () {
        $.ajax({
            url: '/playoff/validate/',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    window.location = '/playoff/result/0';
                } else {
                    window.location = '/playoff';
                }
            }
        });
    };

    /**
     * Reset method.
     */
    this.reset = function () {
        if (confirm('Do you want to restart the playoff process?')) {
            window.location = '/playoff/reset';
        }
    };

    /**
     * Redirect to /group
     */
    this.group = function () {
        window.location = '/group';
    };
};