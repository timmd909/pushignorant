require({
    baseUrl: 'scripts/',
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
    'jquery',
    'lodash',
    'bootstrap'
],
function (ko, $, _) {
    var viewModel = {
        leagues: ko.observableArray([]),
        lineSources: ko.observableArray([]),
    };

    viewModel.loading = ko.pureComputed({
        read: function () {
            return viewModel.leagues().length == 0 ||
                viewModel.lineSources().length == 0;
        }
    });
    viewModel.loadingFailed = ko.observable(false);

    $.ajax({
        url: 'json/teams',
        success: function (data) {
            viewModel.leagues(data.Leagues);
        },
        error: function () {
            viewModel.loadingFailed(true);
        },
    })

    $.ajax({
        url: 'json/lineSources',
        success: function (data) {
            var emptyItem = {
                id: -1,
                name: 'Select line source',
                url: 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
            };
            viewModel.lineSources([emptyItem].concat(data.sources));
        },
        error: function () {
            viewModel.loadingFailed(true);
        },
    })

    ko.applyBindings(viewModel);

    window.viewModel = viewModel;
});
