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
                    alert("Existem jogos já configurados!");
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
        if (confirm('Deseja reestartar o processo?')) {
            window.location = '/process/reset';
        }
    }
};