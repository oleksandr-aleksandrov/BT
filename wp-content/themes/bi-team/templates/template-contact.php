<?php
/*
Template Name: Contacts

*/

get_header();
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-xs-12 p-0">
      <div class="contact-information">
        <div class="row justify-content-end m-0 p-0">
          <div class="col-lg-7 col-md-12 col-xs-12 contact-info-wrap">
            <h2>Contact Information</h2>
            <ul class="list-group">
              <li>
                <a class="site" href="https://fluentpro.com/">www.fluentpro.com</a>
              </li>
              <li>
                <a class="mail" href="mailto:sales@fluentpro.com">sales@fluentpro.com</a>
              </li>
              <li>
                <a class="phone" href="tel:+8553583688">(855)358-3688</a>
              </li>
              <li>
                <a class="map" href="#">FluentPro Software Corporation 8201 164th Ave NE, Ste 200 Redmond, WA 98052</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xs-12">
      <div class="row contact-us-form">
        <div class="col-lg-9 col-md-12 col-xs-12">
          <h2>Contact Us Form</h2>
          <p>
            This is contact us form for Bi Team. Please provide your details and we will get back with you as soon as possible.
          </p>
          <form>

            <div class="form-row">
              <div class="form-group col-xl-6 col-lg-12">
                <input type="text" class="form-control contact-form" id="inputFirstName" placeholder="First Name">
              </div>
              <div class="form-group col-xl-6 col-lg-12">
                <input type="text" class="form-control contact-form" id="inputLastName" placeholder="Last Name">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-xl-6 col-lg-12">
                <input type="text" class="form-control contact-form" id="inputCompanyName" placeholder="Company Name">
              </div>
              <div class="form-group col-xl-6 col-lg-12">
                <input type="text" class="form-control contact-form" id="inputPhoneNumber" placeholder="Phone Number">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-xl-6 col-lg-12">
                <input type="email" class="form-control contact-form" id="inputEmail" placeholder="Email">
              </div>
              <div class="form-group col-xl-6 col-lg-12">
                <input type="text" class="form-control contact-form" id="inputWebsite" placeholder="Website">
              </div>
            </div>

            <div class="form-group">
              <textarea
                class="form-control contact-form message"
                name="textareaMessage"
                id="textareaMessage"
                placeholder="Message"
                cols="30"
                rows="10"></textarea>
            </div>

            <div class="form-group">
              <p class="checkbox-label">I would like to subscribe Bi Team Software newsletter:</p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Bi Team Software Newsletter
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Bi Team Product News
                </label>
              </div>
            </div>

            <button type="submit" class="btn contact-btn">Submit request</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
