require({
    baseUrl: 'js/',
    paths: {
        'jquery': 'lib/jquery',
        'bootstrap': 'lib/bootstrap',
        'knockout': 'lib/knockout',
        'lodash': 'lib/lodash'
    },
    shim: {
        'bootstrap': {
            deps: ['jquery']
        }
    }
}, [
    'knockout',
    'bootstrap'
],
function (ko) {
    var viewModel = {};

    ko.applyBindings(viewModel);

    window.viewModel = viewModel;
});
