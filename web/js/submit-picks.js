require({
    baseUrl: 'js/',
    paths: {
        'jquery': 'lib/jquery',
        'knockout': 'lib/knockout',
        'lodash': 'lib/lodash'
    }
}, [
    'knockout',
    'jquery',
    'lodash'
],
function (ko, $, _) {
    var viewModel = {};

    viewModel.loading = ko.observable(true);
    viewModel.loadingFailed = ko.observable(false);
    viewModel.leagues = ko.observableArray([]);

    $.ajax({
        url: 'json/teams',
        success: function (data) {
            viewModel.loading(false);
            viewModel.leagues(data.Leagues);
        },
        error: function () {
            viewModel.loading(false);
            viewModel.loadingFailed(true);
        },
    })

    ko.applyBindings(viewModel);

    window.viewModel = viewModel;
});
