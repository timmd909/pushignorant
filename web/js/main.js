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
function (ko) {
    var viewModel = {};

    ko.applyBindings(viewModel);

    window.viewModel = viewModel;
});
