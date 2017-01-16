<?php

// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    if ( ! class_exists('ReduxFramework_blogstyle') ) {
        class ReduxFramework_blogstyle {

            /**
             * Field Constructor.
             * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
             *
             * @since ReduxFramework 1.0.0
             */
            function __construct( $field = array(), $value = '', $parent ) {
                $this->parent = $parent;
                $this->field  = $field;
                $this->value  = $value;
            }

            /**
             * Field Render Function.
             * Takes the vars and outputs the HTML for the field in the settings
             *
             * @since ReduxFramework 1.0.0
             */
            function render() {
				
				
				$check_value=$this->value;

                if (!empty( $this->field['data'] ) && empty( $this->field['blogstyles'] ) ) {
                    if ( empty( $this->field['args'] ) ) {
                        $this->field['args'] = array();
                    }
                    $this->field['blogstyles'] = $this->parent->get_wordpress_data( $this->field['data'], $this->field['args']);
                }

                echo '<ul class="blog-style">';

                if ( ! empty( $this->field['blogstyles'] ) ) {
                    
                    
					$blogstyles_options=$this->field['blogstyles'];
					
					 
					
					foreach($blogstyles_options as $k=>$v)
					{
						
					
					echo '<li>';
                        echo '<label for="' . $this->field['id'] . '_' . array_search( $k, array_keys( $this->field['blogstyles'] ) ) . '">';
                        
						if(isset($check_value['blogstyle-type']))
						{
						echo '<input type="radio" class="radio ' . $this->field['class'] . '" id="' . $this->field['id'] . '_' . array_search( $k, array_keys( $this->field['blogstyles'] ) ) . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '[blogstyle-type]' . '" value="' . $k . '" ' . checked($check_value['blogstyle-type'], $k, false ) . '/>';
						}else 
						{
							echo '<input type="radio" class="radio ' . $this->field['class'] . '" id="' . $this->field['id'] . '_' . array_search( $k, array_keys( $this->field['blogstyles'] ) ) . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '[blogstyle-type]' . '" value="' . $k . '"/>';
						}
                       // echo ' <span>'.$k.'</span>';
                        echo '</label>';
						echo '<lable>';
						echo '<select name="' . $this->field['name'] . $this->field['name_suffix'] . '[blogstyle-value'.$k.']' . '">';
						for($i=0;$i<count($v);$i++)
						{
						echo '<option value="'.$v[$i].'">'.$v[$i].'</option>';
						}
						  
						echo '</select>';
						echo '</label>';
                        echo '</li>';
						
					}
					
					
					
                    //foreach

                    echo '</ul>';
                }
            } //function
        } //class
    }