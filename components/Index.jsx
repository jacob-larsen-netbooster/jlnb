var React = require( 'react' ),
    ReactDOM = require( 'react-dom' );

var Router = require( './Router.jsx' );
var Menu = require( './Menu.jsx' );
var StandardComponent = require( './Boiler.jsx' ); // <StandardComponent />

var PageWrapper = React.createClass({
  render() {
    return (
      <div>
        <h1>-- React rendered start --</h1>
        <Menu menu={'topMenu'}/>
        <Router />
        <h1>-- React rendered end --</h1>
      </div>
    );
  }
});


// ReactDOM.render(<Menu />, document.getElementById('js-rendere'));
ReactDOM.render(<PageWrapper />, document.getElementById('js-rendere'));