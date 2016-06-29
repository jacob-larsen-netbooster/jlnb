var React = require( 'react' );

var Loop = require( './loop/loop.jsx' );

/**
 * Handles getting of posts from the server
 */
var Content = React.createClass({
	render: function() {
		var singlePostID;
		
		// console.log('content:');
		console.log(this.props.data);

		// Check if we're just viewing one post, if so, pass the ID down
		if ( this.props.data.length === 1 ) {
			singlePostID = this.props.data[0].id;
		} else {
			singlePostID = 0;
		}
		return (
			<Loop data={ this.props.data } context={ this.props.bodyClass } postID={ singlePostID } />
		);
	}
});

module.exports = Content;