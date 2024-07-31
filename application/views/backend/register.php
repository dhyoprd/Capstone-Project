<?php include 'css.php'; ?>
<?php include 'footer.php'; ?>

                
                    

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg" href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="ti-menu"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="#">
                        <b><img src="<?php echo base_url();?>uploads/logo.png" width="50" height="50" alt="home" /></b>
                        <span class="hidden-xs">
                            <strong><?php echo $this->db->get_where('settings', array('type' => 'abb'))->row()->description;?></strong>
                        </span>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-center pull-center">
                    <!-- Translation Code here -->
                    <li>
                        <div class="translate" id="google_translate_element"></div>
                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                            }
                        </script>
                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
                    
            
    



<div class="row">
    <div class="col-sm-12">
		<div class="panel panel-info">
            <div class="panel-body">
				<?php echo form_open(base_url() . 'patient/add_patient/register/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('full_name');?>*
                                    </label>
                                    <div class="col-md-12">
										<?php
                                    function generateRandomString($length = 10) {
                                        $characters = 'ABCDEFGHIJKLMNO0123456789PQRSTUVWXYZ0123456789ABCDEFGHIJ0123456789KLMNOPQRSTUVWXYZ';
                                        $charactersLength = strlen($characters);
                                        $randomString = '';
                                        for ($i = 0; $i < $length; $i++) {
                                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                                        }
                                        return $randomString;
                                    }
                                    ?>  
                                        <input type="text" id="example-text" name="pid" class="form-control m-r-10" value="<?php echo generateRandomString(); ?>" readonly="true">
                                        <input type="text" id="example-text" name="name" class="form-control m-r-10" placeholder="enter your name" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-sm-12"><?php echo get_phrase('gender');?>*</label>
                                    <div class="col-sm-12">
                                       <select class="form-control" name="sex" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_gender');?></option>
										<option value="Male"><?php echo get_phrase('male');?></option>
                                        <option value="Female"><?php echo get_phrase('female');?></option>
                                        <option value="Others"><?php echo get_phrase('others');?></option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                      <label class="col-sm-12" ><?php echo get_phrase('date_of_birth');?>*</label>
                                    <div class="col-md-12">
                                        <input class="form-control " name="birth_date" type="date" value="<?php echo date('Y-m-d');?>" id="example-date-input" required>
										<input type="text" id="example-text" name="age" class="form-control m-r-10" placeholder="enter your age" required>
										<input type="text" id="example-text" name="place_of_birth" class="form-control m-r-10" placeholder="enter place of birth" required>


                                    </div>
                                </div>
								
								<div class="col-md-4">
                                                    <div class="form-group">
                                <label class="control-label"><?php echo get_phrase('id_card');?></label>
                                  <input type="text" name="idcard" id="firstName" class="form-control" placeholder="eg International password, drivers license">
                                                    </div>
                                                </div>
												
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo get_phrase('issue_at');?></label>
                                                        <input type="text" name="issue_at" id="firstName" class="form-control" placeholder="Place of Issuing ID card">
                                                 </div>
                                                </div>
												
												<div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo get_phrase('issue_on');?></label>
                            <input class="form-control " name="issue_on" type="date" value="2011-08-19" id="example-date-input" placeholder="Issue Date" >
                                                 </div>
                                                </div>
								
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('occupation');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="occupation" class="form-control m-r-10" placeholder="Occupation" required>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('mother_tongue');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="mother_tongue" class="form-control m-r-10" placeholder="enter your mother tongue" required>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                                    <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('marital_status');?>*</label>
                                       <select class="form-control" name="marital_status" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_marital_status');?></option>
										<option data-tokens="Married"><?php echo get_phrase('married');?></option>
                                        <option data-tokens="Single"><?php echo get_phrase('single');?></option>
                                        <option data-tokens="Divorced"><?php echo get_phrase('divorced');?></option>
                                        <option data-tokens="Engaged"><?php echo get_phrase('engaged');?></option>
                                    </select>
                                    </div>
                                </div>
								
                                <div class="col-md-6">
                                                    <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('religion');?>*</label>
                                       <select class="form-control" name="religion" data-style="btn-primary btn-outline" required>
                                         <option data-tokens=""><?php echo get_phrase('select_religion');?></option>
										<option data-tokens="Christianity"><?php echo get_phrase('Christianity');?></option>
                                        <option data-tokens="Islam"><?php echo get_phrase('Islam');?></option>
                                        <option data-tokens="Hindu"><?php echo get_phrase('Hindu');?></option>
                                        <option data-tokens="Budha"><?php echo get_phrase('Budha');?></option>
                                        <option data-tokens="Konghucu"><?php echo get_phrase('Konghucu');?></option>
                                        <option data-tokens="Others"><?php echo get_phrase('others');?></option>
                                    </select>
                                    </div>
                                </div>
								
								
                                <div class="form-group">
                                    <label class="col-md-12"><?php echo get_phrase('address');?>*</label>
                                    <div class="col-md-12">
                             <textarea class="form-control m-r-10" rows="5" name="address" placeholder="Enter Address ..." required></textarea>

                                    </div>
                                </div>
								 <div class="row">
								<div class="col-md-4">
                                  <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('city');?>*</label>
                              
                                        <input type="text" id="example-text" name="city" class="form-control m-r-10" placeholder="enter your city" required>
                                    </div>
                                </div>
								
									<div class="col-md-4">
                                                    <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('state');?>*</label>
                                        <input type="text" id="example-text" name="state" class="form-control m-r-10" placeholder="enter your state" required>
                                    </div>
                                </div>
								
								<div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> <?php echo get_phrase('nationality');?>*</label>
                                        <input type="text" id="example-text" name="nationality" class="form-control m-r-10" placeholder="enter your nationality" required>
                                    </div>
                                </div>
								</div>
								
								 <div class="row">
								 <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('phone');?>*</label>
                               <input type="text" id="example-phone" name="phone" class="form-control" placeholder="enter your phone" data-mask="(999) 999-9999" required>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><?php echo get_phrase('mobile_no');?></label>
                               <input type="text" id="example-phone" name="mobile_no" class="form-control" placeholder="enter your mobile number" data-mask="(999) 999-9999" required>
                                    </div>
                                </div>
								</div>
		
		<div class="alert alert-info"><?php echo get_phrase('medical_history');?>*</div>
								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('blood_group');?>*</span>
                                    </label>
                                    <div class="col-md-12">
                                       <select class="form-control" name="blood_group" required>

                                        <option value="A+">A+</option>

                                        <option value="A">A</option>

                                        <option value="A-">A-</option>

                                        <option value="B+">B+</option>

                                        <option value="B">B</option>

                                        <option value="B-">B-</option>

                                        <option value="AB+">AB+</option>

                                        <option value="AB">AB</option>

                                        <option value="AB-">AB-</option>

                                        <option value="O+">O+</option>

                                        <option value="O">O</option>

                                        <option value="O-">O-</option>

                                    </select>                                    </div>
                                </div>
								
								 



								
		<div class="alert alert-info"><?php echo get_phrase('login_details');?></div>

								
								 <div class="form-group">
                                    <label class="col-md-12" for="example-email"><?php echo get_phrase('email');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="email" id="example-email" name="email" class="form-control m-r-10" placeholder="enter your email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="pwd"><?php echo get_phrase('password');?>*
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" id="pwd" name="password" class="form-control" placeholder="enter your password" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-rounded btn-sm btn-block"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('save');?></button>
                                
                </div>
        </div>

        <?php echo form_close();?>   
                   
     </div>
    </div>
</div>
</div>
</div>   