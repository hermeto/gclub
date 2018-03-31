/**
 * Index class.
 */
let index = new function () {
    /**
     * Process method.
     */
    this.process = function () {
        $.ajax({
            url: '/process/validate'
        });
    };
};