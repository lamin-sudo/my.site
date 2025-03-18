/*admin css*/
( function( emart_shop_api ) {

	emart_shop_api.sectionConstructor['emart_shop_upsell'] = emart_shop_api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
