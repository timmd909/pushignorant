require({
    baseUrl: 'js/',
    paths: {
        'jquery': 'lib/jquery',
        'knockout': 'lib/knockout',
    }
}, [
    'knockout',
    'jquery'
],
function (ko, $) {
    var viewModel = {};

    $.ajax({
        url: 'json/teams',
        success: function (a, b, c) {
            debugger;
        },
        failure: function (a, b, c) {
            debugger;
        },
    })

    ko.applyBindings(viewModel);

    window.viewModel = viewModel;
});
