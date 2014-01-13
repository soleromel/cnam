/**
 * Created with JetBrains PhpStorm.
 * User: solerst
 * Date: 06/08/13
 * Time: 16:30
 * To change this template use File | Settings | File Templates.
 */

var IAmAsync = function(param, callback) {
    function iWantToBeAsync() {
        console.log("I want to be async");
        if (param) { callback("returnValue") };

    };
    setTimeout(iWantToBeAsync,0);
}

IAmAsync("myparam", function(val) {
    // ca va e^tre exécuté quand fini
})

//code continuera mm si IAmAsync pas fini