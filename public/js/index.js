/**
 * Index class.
 */
let index = new function () {
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
                    if (confirm('Existe um grupo configurado, deseja visualiza-lo? Caso não, o processo será refeito.')) {
                        window.location = '/group';
                    }
                }
                window.location = '/process';
            }
        });
    };
};