<?php
    
class DvdView extends Product implements ProductViewInterface {

  public function generateForm() {
    $html = '<div class="col-12 form-row additional-form">';
    $html .= '<h5 class="form-label">Size (MB)</h5>'; 
    $html .= '<input type="text" class="form-control form-default-input" placeholder="size" aria-label="NAME" id="size">'; 
    $html .= '</div>';
    $html .= '<p class="guidance-msg">Please provide the storage size in MB</p>';

    return $html; 
  }
}
 