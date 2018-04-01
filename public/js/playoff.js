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
                    alert("Existem chaves já definidas!");
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
        if (confirm('Deseja reestartar o processo?')) {
            window.location = '/playoff/reset';
        }
    }
};