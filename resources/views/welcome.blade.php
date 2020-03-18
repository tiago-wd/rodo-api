<!DOCTYPE html>
<html>
  <head>
    <title>Custom Interactions</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v5.3.0/css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>

  </head>
  <body>
    <div id="map" class="map"></div>
    <script>
      import Feature from 'ol/Feature.js';
      import Map from 'ol/Map.js';
      import View from 'ol/View.js';
      import {LineString, Point, Polygon} from 'ol/geom.js';
      import {defaults as defaultInteractions, Pointer as PointerInteraction} from 'ol/interaction.js';
      import {Tile as TileLayer, Vector as VectorLayer} from 'ol/layer.js';
      import {TileJSON, Vector as VectorSource} from 'ol/source.js';
      import {Fill, Icon, Stroke, Style} from 'ol/style.js';


      /**
       * @constructor
       * @extends {module:ol/interaction/Pointer}
       */
      var Drag = (function (PointerInteraction) {
        function Drag() {
          PointerInteraction.call(this, {
            handleDownEvent: handleDownEvent,
            handleDragEvent: handleDragEvent,
            handleMoveEvent: handleMoveEvent,
            handleUpEvent: handleUpEvent
          });

          /**
           * @type {module:ol/pixel~Pixel}
           * @private
           */
          this.coordinate_ = null;

          /**
           * @type {string|undefined}
           * @private
           */
          this.cursor_ = 'pointer';

          /**
           * @type {module:ol/Feature~Feature}
           * @private
           */
          this.feature_ = null;

          /**
           * @type {string|undefined}
           * @private
           */
          this.previousCursor_ = undefined;
        }

        if ( PointerInteraction ) Drag.__proto__ = PointerInteraction;
        Drag.prototype = Object.create( PointerInteraction && PointerInteraction.prototype );
        Drag.prototype.constructor = Drag;

        return Drag;
      }(PointerInteraction));


      /**
       * @param {module:ol/MapBrowserEvent~MapBrowserEvent} evt Map browser event.
       * @return {boolean} `true` to start the drag sequence.
       */
      function handleDownEvent(evt) {
        var map = evt.map;

        var feature = map.forEachFeatureAtPixel(evt.pixel,
          function(feature) {
            return feature;
          });

        if (feature) {
          this.coordinate_ = evt.coordinate;
          this.feature_ = feature;
        }

        return !!feature;
      }


      /**
       * @param {module:ol/MapBrowserEvent~MapBrowserEvent} evt Map browser event.
       */
      function handleDragEvent(evt) {
        var deltaX = evt.coordinate[0] - this.coordinate_[0];
        var deltaY = evt.coordinate[1] - this.coordinate_[1];

        var geometry = this.feature_.getGeometry();
        geometry.translate(deltaX, deltaY);

        this.coordinate_[0] = evt.coordinate[0];
        this.coordinate_[1] = evt.coordinate[1];
      }


      /**
       * @param {module:ol/MapBrowserEvent~MapBrowserEvent} evt Event.
       */
      function handleMoveEvent(evt) {
        if (this.cursor_) {
          var map = evt.map;
          var feature = map.forEachFeatureAtPixel(evt.pixel,
            function(feature) {
              return feature;
            });
          var element = evt.map.getTargetElement();
          if (feature) {
            if (element.style.cursor != this.cursor_) {
              this.previousCursor_ = element.style.cursor;
              element.style.cursor = this.cursor_;
            }
          } else if (this.previousCursor_ !== undefined) {
            element.style.cursor = this.previousCursor_;
            this.previousCursor_ = undefined;
          }
        }
      }


      /**
       * @return {boolean} `false` to stop the drag sequence.
       */
      function handleUpEvent() {
        this.coordinate_ = null;
        this.feature_ = null;
        return false;
      }


      var pointFeature = new Feature(new Point([0, 0]));

      var lineFeature = new Feature(
        new LineString([[-1e7, 1e6], [-1e6, 3e6]]));

      var polygonFeature = new Feature(
        new Polygon([[[-3e6, -1e6], [-3e6, 1e6],
          [-1e6, 1e6], [-1e6, -1e6], [-3e6, -1e6]]]));


      var map = new Map({
        interactions: defaultInteractions().extend([new Drag()]),
        layers: [
          new TileLayer({
            source: new TileJSON({
              url: 'https://api.tiles.mapbox.com/v3/mapbox.geography-class.json?secure'
            })
          }),
          new VectorLayer({
            source: new VectorSource({
              features: [pointFeature, lineFeature, polygonFeature]
            }),
            style: new Style({
              image: new Icon(/** @type {module:ol/style/Icon~Options} */ ({
                anchor: [0.5, 46],
                anchorXUnits: 'fraction',
                anchorYUnits: 'pixels',
                opacity: 0.95,
                src: 'data/icon.png'
              })),
              stroke: new Stroke({
                width: 3,
                color: [255, 0, 0, 1]
              }),
              fill: new Fill({
                color: [0, 0, 255, 0.6]
              })
            })
          })
        ],
        target: 'map',
        view: new View({
          center: [0, 0],
          zoom: 2
        })
      });
    </script>
  </body>
</html>