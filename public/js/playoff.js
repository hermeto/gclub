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
                    if (confirm("Existem chaves já configuradas! Deseja visualiza-las? (Caso não, o processo será refeito.")) {
                        window.location = '/playoff/result/0';
                    } else {
                        window.location = '/playoff';
                    }
                } else {
                    window.location = '/playoff';
                }
            }
        });
    };
};