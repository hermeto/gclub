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
                    if (confirm("Existem jogos já configurados! Deseja visualiza-los? (Caso não, o processo será refeito.")) {
                        window.location = '/group';
                    } else {
                        window.location = '/process';
                    }
                } else {
                    window.location = '/process';
                }
            }
        });
    };
};