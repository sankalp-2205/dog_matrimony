
<!DOCTYPE html>
<html class='use-all-space'>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge' />
    <meta charset='UTF-8'>
    <title>Maps SDK for Web - Geocode</title>
    <meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.55.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='../assets/ui-library/index.css'/>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.55.0/maps/css-styles/poi.css'/>
</head>
<body>
    <div class='map-view'>
        <form class='tt-side-panel js-form'>
            <header class='tt-side-panel__header'>
                <div class='tt-input-icon'>
                    <input class='tt-input' name='query' placeholder='Query e.g. Washington'>
                    <span class='tt-icon -search'></span>
                </div>
            </header>
            <div class='tt-tabs js-tabs'>
                <div class='tt-tabs__tabslist' role='tablist'>
                    <button role='tab' aria-selected='true' aria-controls='options' class='tt-tabs__tab'
                        type='button'>Params</button>
                    <button role='tab' aria-selected='false' aria-controls='results' class='tt-tabs__tab'
                        type='button'>Results</button>
                </div>
                <div role='tabpanel' class='tt-tabs__panel' id='options'>
                    <div class='tt-params-box'>
                        <header class='tt-params-box__header'>
                            Geocode parameters
                        </header>
                        <div class='tt-params-box__content'>
                            <label class='tt-form-label'>
                                Language
                                <select class='js-language-select tt-select'></select>
                            </label>
                            <label class='tt-form-label'>
                                Geopolitical view
                                <select class='js-geo-view-select tt-select'></select>
                            </label>
                            <label class='tt-form-label js-slider'>
                                Limit (<span class='js-counter'>10</span>)
                                <input class='tt-slider' name='limit' type='range' min='1' max='100' value='10'>
                            </label>

                            <div class='tt-spacing-top-24 js-bias-container'>
                                <div class='tt-controls-group'>
                                    <div class='tt-controls-group__title'>
                                        Geobias
                                    </div>
                                    <div class='tt-controls-group__toggle'>
                                        <input id='toggle1' class='tt-toggle js-bias-toggle' type='checkbox'
                                            checked='true'>
                                        <label for='toggle1' class='tt-label'></label>
                                    </div>

                                    <div class='js-bias-controls'>
                                        <label class='tt-form-label js-slider'>
                                            Radius (<span class='js-counter'>0</span>m)
                                            <input class='tt-slider' name='radius' type='range' min='0' max='10000'
                                                value='0'>
                                        </label>
                                        <label class='tt-form-label'>
                                            Latitude
                                            <input class='tt-input' name='latitude' placeholder='e.g. 37.9717162'>
                                        </label>
                                        <label class='tt-form-label'>
                                            Longitude
                                            <input class='tt-input' name='longitude' placeholder='e.g. 23.7263126'>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class='tt-spacing-top-24'>
                                <input type='submit' class='tt-button -primary tt-spacing-top-24' name='submit'
                                    title='Submit'>
                            </div>
                        </div>
                    </div>
                </div>
                <div role='tabpanel' class='tt-tabs__panel' hidden='hidden' id='results'>
                    <div class='js-results' hidden='hidden'></div>
                    <div class='js-results-loader' hidden='hidden'>
                        <div class='loader-center'><span class='loader'></span></div>
                    </div>
                    <div class='tt-tabs__placeholder js-results-placeholder'>
                        NO RESULTS
                    </div>
                </div>
            </div>
        </form>
        <div id='map' class='full-map'></div>
    </div>
    <script>
        tt.setProductInfo('Codepen Examples', '${analytics.productVersion}');
var map = tt.map({
    key: '7Ri1Qnoxv2uC1FsDwhRRrml9lG4w7orq',
    container: 'map',
    style: 'tomtom://vector/1/basic-main',
    center: [6.315226, 45.095108],
    zoom: 1,
    dragPan: !isMobileOrTablet()
});
map.addControl(new tt.FullscreenControl({ container: document.querySelector('body') }));
map.addControl(new tt.NavigationControl());
new SidePanel('.tt-side-panel', map);
var searchMarkersManager = new SearchMarkersManager(map);
var tabs = new Tabs('.js-tabs');
Array.prototype.slice.call(document.querySelectorAll('.js-slider'))
    .forEach(function(slider) {
        new Slider(slider);
    });
var languageSelector = new TailSelector(searchLanguages, '.js-language-select', 'en-GB');
var geopolSelector = new TailSelector(searchGeopoliticalViews, '.js-geo-view-select', 'Unified');
geopolSelector.getElement().on('change', function(selected) {
    this.map.setGeopoliticalView(selected.key);
}.bind(this));
function Geocode() {
    this.domHelpers = DomHelpers;
    this.searchResultsParser = SearchResultsParser;
    this.formatters = Formatters;
    this.resultsManager = new ResultsManager();
    this.errorHint = new InfoHint('error', 'bottom-center', 5000)
        .addTo(document.getElementById('map'));
    this.elements = {
        language: languageSelector.getElement(),
        view: geopolSelector.getElement(),
        biasContainer: document.querySelector('.js-bias-container'),
        biasPlaceholder: document.querySelector('.js-bias-placeholder'),
        biasControls: document.querySelector('.js-bias-controls'),
        geobiasToggle: document.querySelector('.js-bias-toggle'),
        form: document.querySelector('.js-form')
    };
    Array.prototype.slice.call(document.querySelectorAll('input'))
        .forEach(function(input) {
            this.elements[input.name] = input;
        }.bind(this));
    this.state = {
        query: this.elements.query.value,
        language: 'en-GB',
        limit: this.elements.limit.value,
        radius: this.elements.radius.value,
        isGeobiasActive: true,
        markers: {}
    };
    this.updateInputValue = this.updateInputValue.bind(this);
    this.updateSelectValue = this.updateSelectValue.bind(this);
    this.bindEvents();
}
Geocode.prototype.bindEvents = function() {
    this.elements.language.on('change', this.updateSelectValue.bind(this, 'language'));
    this.elements.query.addEventListener('change', this.updateInputValue.bind(this, 'query'));
    this.elements.latitude.addEventListener('change', this.updateInputValue.bind(this, 'latitude'));
    this.elements.longitude.addEventListener('change', this.updateInputValue.bind(this, 'longitude'));
    this.elements.limit.addEventListener('change', this.updateInputValue.bind(this, 'limit'));
    this.elements.radius.addEventListener('change', this.updateInputValue.bind(this, 'radius'));
    this.elements.geobiasToggle.addEventListener('click', this.toggleGeoBias.bind(this));
    this.elements.submit.addEventListener('click', this.handleSubmit.bind(this));
    this.elements.form.addEventListener('submit', this.handleSubmit.bind(this));
    map.on('load', this.updateBiasPosition.bind(this));
    map.on('moveend', this.updateBiasPosition.bind(this));
};
Geocode.prototype.updateBiasPosition = function() {
    var lat = Formatters.roundLatLng(map.getCenter().lat);
    var lng = Formatters.roundLatLng(map.getCenter().lng);
    this.elements.latitude.value = lat;
    this.elements.longitude.value = lng;
    this.state.latitude = lat;
    this.state.longitude = lng;
};
Geocode.prototype.updateInputValue = function(property, event) {
    this.state[property] = event.target.value;
    if (property === 'minFuzzyLevel' || property === 'maxFuzzyLevel') {
        this.validateMinMaxFuzzy();
    }
};
Geocode.prototype.updateSelectValue = function(property, selected) {
    var selectedKey = selected.key;
    this.state[property] = selectedKey;
};
Geocode.prototype.toggleGeoBias = function() {
    var isGeobiasActive = !this.state.isGeobiasActive;
    this.state.isGeobiasActive = isGeobiasActive;
    Array.prototype.slice.call(this.elements.biasControls.querySelectorAll('label, input'))
        .forEach(function(label) {
            if (isGeobiasActive) {
                label.removeAttribute('disabled');
            } else {
                label.setAttribute('disabled', 'true');
            }
        });
};
Geocode.prototype.handleSubmit = function(event) {
    event.preventDefault();
    var callParameters = {
        key: '7Ri1Qnoxv2uC1FsDwhRRrml9lG4w7orq',
        query: this.state.query,
        language: this.state.language,
        limit: this.state.limit
    };
    this.resultsManager.loading();
    searchMarkersManager.clear();
    if (this.state.query) {
        tabs.clickTab(document.querySelector('[aria-controls="results"]'));
    } else {
        this.resultsManager.resultsNotFound();
    }
    if (this.state.isGeobiasActive) {
        callParameters.radius = this.state.radius;
        callParameters.center = [this.state.longitude, this.state.latitude];
    }
    tt.services.geocode(callParameters)
        .go()
        .then(this.handleResponse.bind(this))
        .catch(this.handleError.bind(this));
};
Geocode.prototype.handleResponse = function(response) {
    var resultsDocumentFragment = document.createDocumentFragment();
    if (response.results && response.results.length > 0) {
        this.resultsManager.success();
        Array.prototype.slice.call(response.results)
            .forEach(function(result) {
                var distance = this.searchResultsParser.getResultDistance(result);
                var searchResult = this.domHelpers.createSearchResult(
                    this.searchResultsParser.getResultAddress(result),
                    distance ? this.formatters.formatAsMetricDistance(distance) : ''
                );
                var resultItem = this.domHelpers.createResultItem();
                resultItem.appendChild(searchResult);
                resultItem.setAttribute('data-id', result.id);
                resultItem.addEventListener('click', this.handleSearchResultItemClick.bind(this));
                resultsDocumentFragment.appendChild(resultItem);
            }, this);
        searchMarkersManager.draw(response.results);
        map.fitBounds(searchMarkersManager.getMarkersBounds(), { padding: 50 });
        var resultList = this.domHelpers.createResultList();
        resultList.appendChild(resultsDocumentFragment);
        this.resultsManager.append(resultList);
    } else {
        this.resultsManager.resultsNotFound();
        this.errorHint.setMessage('No results found for given parameters');
    }
};
Geocode.prototype.handleError = function(error) {
    this.errorHint.setMessage(error.message);
};
Geocode.prototype.selectResultItem = function(resultItem) {
    Array.prototype.slice.call(document.querySelectorAll('.tt-results-list__item'))
        .forEach(function(item) {
            item.classList.remove('-selected');
        });
    resultItem.classList.add('-selected');
};
Geocode.prototype.handleSearchResultItemClick = function(event) {
    var id = event.currentTarget.getAttribute('data-id');
    searchMarkersManager.openPopup(id);
    searchMarkersManager.jumpToMarker(id);
};
new Geocode();
    </script>
</body>
</html>