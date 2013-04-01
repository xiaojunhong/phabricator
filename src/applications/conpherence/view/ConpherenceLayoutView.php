<?php

final class ConpherenceLayoutView extends AphrontView {

  private $selectedConpherencePHID;
  private $baseURI;

  public function setBaseURI($base_uri) {
    $this->baseURI = $base_uri;
    return $this;
  }

  public function setSelectedConpherencePHID($selected_conpherence_phid) {
    $this->selectedConpherencePHID = $selected_conpherence_phid;
    return $this;
  }

  public function render() {

    Javelin::initBehavior('conpherence-menu',
      array(
        'base_uri' => $this->baseURI,
        'header' => 'conpherence-header-pane',
        'messages' => 'conpherence-messages',
        'messages_pane' => 'conpherence-message-pane',
        'widgets_pane' => 'conpherence-widget-pane',
        'form_pane' => 'conpherence-form',
        'menu_pane' => 'conpherence-menu',
        'selected_conpherence_id' => $this->selectedConpherencePHID,
        'fancy_ajax' => (bool)$this->selectedConpherencePHID,
      ));

    Javelin::initBehavior('conpherence-drag-and-drop-photo',
      array(
        'target' => 'conpherence-header-pane',
        'form_pane' => 'conpherence-form',
        'upload_uri' => '/file/dropupload/',
        'activated_class' => 'conpherence-header-upload-photo',
      ));

    return javelin_tag(
      'div',
      array(
        'id' => 'conpherence-main-pane',
        'sigil' => 'conpherence-layout'
      ),
      array(
        javelin_tag(
          'div',
          array(
            'class' => 'conpherence-header-pane',
            'id' => 'conpherence-header-pane',
            'sigil' => 'conpherence-header',
          ),
          ''),
        phutil_tag(
          'div',
          array(
            'class' => 'conpherence-widget-pane',
            'id' => 'conpherence-widget-pane'
          ),
          ''),
        javelin_tag(
          'div',
          array(
            'class' => 'conpherence-message-pane',
            'id' => 'conpherence-message-pane'
          ),
          array(
            javelin_tag(
              'div',
              array(
                'class' => 'conpherence-messages',
                'id' => 'conpherence-messages',
                'sigil' => 'conpherence-messages',
              ),
              ''),
            phutil_tag(
              'div',
              array(
                'id' => 'conpherence-form'
              ),
              '')
          ))
      ));
  }

}