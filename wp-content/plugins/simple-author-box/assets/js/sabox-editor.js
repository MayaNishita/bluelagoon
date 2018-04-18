(function( $ ) {

  'use strict';
  var SABox = {};

  var mediaControl = {

    // Initializes a new media manager or returns an existing frame.
    // @see wp.media.featuredImage.frame()
    selector: null,
    size: null,
    container: null,
    frame: function() {
      if ( this._frame ) {
        return this._frame;

      }

      this._frame = wp.media( {
        title: 'Media',
        button: {
          text: 'Update'
        },
        multiple: false
      } );

      this._frame.on( 'open', this.updateFrame ).state( 'library' ).on( 'select', this.select );

      return this._frame;

    },

    select: function() {
      var context = $( '#sabox-custom-profile-image' ),
          input = context.find( '#sabox-custom-image' ),
          image = context.find( 'img' ),
          attachment = mediaControl.frame().state().get( 'selection' ).first().toJSON();

      image.attr( 'src', attachment.url );
      input.val( attachment.url );

    },

    init: function() {
      var context = $( '#sabox-custom-profile-image' );
      context.on( 'click', '#sabox-add-image', function( e ) {
        e.preventDefault();
        mediaControl.frame().open();
      } );

      context.on( 'click', '#sabox-remove-image', function( e ) {
        var context = $( '#sabox-custom-profile-image' ),
            input = context.find( '#sabox-custom-image' ),
            image = context.find( 'img' );

        e.preventDefault();

        input.val( '' );
        image.attr( 'src', image.data( 'default' ) );
      } );

    }

  };

  $( document ).ready( function() {
    if ( $( '#description' ).length > 0 ) {
      wp.editor.initialize( 'description', {
        tinymce: {
          wpautop: true
        },
        quicktags: true
      } );
    }

    // Add Social Links
    $( '.sabox-add-social-link' ).click( function() {

      if ( undefined === SABox.html ) {
        SABox.html = '<tr> <th><span class="sabox-drag"></span><select name="sabox-social-icons[]">';
        $.each( SABHerlper.socialIcons, function( key, name ) {
          SABox.html = SABox.html + '<option value="' + key + '">' + name + '</option>';
        } );
        SABox.html = SABox.html + '</select></th><td><input name="sabox-social-links[]" type="text" class="regular-text"><span class="dashicons dashicons-trash"></span><td></tr>';
      }

      $( '#sabox-social-table' ).append( SABox.html );

    } );

    // Remove Social Link
    $( '#sabox-social-table' ).on( 'click', '.dashicons-trash', function() {
      var row = $( this ).parents( 'tr' );
      row.fadeOut( 'slow', function() {
        row.remove();
      } );
    } );

    mediaControl.init();

  } );

})( jQuery );
