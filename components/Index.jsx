var React = require( 'react' ),
    ReactDOM = require( 'react-dom' );

var Router = require( './Router.jsx' );
var Menu = require( './Menu.jsx' );
var StandardComponent = require( './Boiler.jsx' ); // <StandardComponent />


/*
 WP Settings
*/
var frontpageid = document.body.getAttribute('data-frontpageid');


  


var PageWrapper = React.createClass({
  render() {
    return (
        <Router frontpageid={frontpageid} />
    );
  }
});

ReactDOM.render(<Menu menu={'topMenu'}/>, document.getElementById('jlnb-topMenu'));
ReactDOM.render(<PageWrapper />, document.getElementById('jlnb-mainPage'));