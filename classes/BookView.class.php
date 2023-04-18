<?php
    
class BookView extends Product implements ProductViewInterface {

  public function generateForm() {
    $html = '<div class="col-12 form-row additional-form">';
    $html .= '<h5 class="form-label">Weight (KG)</h5>'; 
    $html .= '<input type="number" class="form-control form-default-input" placeholder="book weight" aria-label="NAME" id="weight">'; 
    $html .= '<span id="weight-feedback"></span>';
    $html .= '</div>';
    $html .= '<p class="guidance-msg">Please provide the weight in KG</p>';

    return $html; 
  }
}

