<?php
    
class BookView extends Product implements ProductViewInterface {

  public function generateForm() {
    $html = '<div class="col-12 form-row">';
    $html .= '<h5 class="form-label">Weight (KG)</h5>'; 
    $html .= '<input type="text" class="form-control form-default-input" placeholder="book weight" aria-label="NAME" id="weight">'; 
    $html .= '</div>';
    $html .= '<p>Please provide the weight in KG<p>';

    return $html; 
  }
}

