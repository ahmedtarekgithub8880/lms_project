@extends('layouts.app')
@section('page_title' , __('Privacy Policy'))
@section('page_info' , __('Privacy Policy'))
@section('content')

@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- =================================== FAQS =================================== -->
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="tab-content tabs_content_creative" id="myTabContent">
    
    {!!  app()->getLocale() == 'en' ? setting('privacy.privacy') : setting('privacy.privacy_ar') !!}


                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ====================================== FAQS =================================== -->

@endsection

<!---    
<h3>Data Academy Privacy Policy</h3>

<p>Privacy Statement Of Data Academy Platform:</p>
<p>How does Data Academy platform handle the information you provide to us?
The platform is committed to securing your privacy when you visit our website and communicate with us electronically. This page shows the way in which any personal information you provide to us while on our site will be used</p>

<h3>Absence of legal liability:</h3>
<p>The user acknowledges that he is solely responsible for the nature of the use he determines for the platform's website, and the management of the Data Academy platform Website disclaims its party،To the maximum extent permitted by law, the user shall be fully liable for any losses, damages, expenses or expenses incurred by the user or suffered by him or any other party as a result of using the website of the platform or inability to use it.

Service interruptions, omissions and errors on the website:
The site administration makes every effort to ensure and maintain the continuity of the website without problems،However, errors, omissions, service interruptions and delays may occur at any time, and in such cases we will expect users to be patient until the service returns to its normal rate.

Subscriber account, password and information security:

The subscriber chooses a password for his account, and he will enter his own mailing address to send messages to him, and it is the responsibility of protecting this password and not sharing it or publishing it to the subscriber،In the event of any transactions using this password, the subscriber will bear all the responsibilities arising from this, without the slightest responsibility on the platform.</p>

<h3>Cookies :</h3>
 <p>We use cookies and similar technologies (such as web beacons, pixels, tags, and scripts) to improve and personalize your experience, provide our services, analyze website performance.</p>


<h3>External Links:</h3>
<p>the Site contains links to third party sites and if you link to a third party site from the Site, any data you provide to that site and any use of that data by the third party are not under the control of Data Academy platform and are not subject to this Policy.</p>


<h3>Our Legal Basis for Using Your Personal Information </h3>
 <p>Where relevant under applicable laws, all processing of your personal information will be justified by a "lawful ground" for processing as detailed below.</p>

<h3>Updating Personal Information:</h3>
<p>We take steps to ensure that the personal information we collect is accurate and up to date, and we provide you with the opportunity to update your information through your account profile settings. In the event that you believe your information is in any way incorrect or inaccurate, please let us know immediately.
Sharing Personal Information with Third Parties –
 We share personal information with third parties in order to operate the Site, provide our services to you, fulfil obligations imposed on us by applicable laws and regulations, and prevent fraud, infringements and illegal activities.</p>

<h3>Contact Us </h3>
<p> You can exercise your rights over your personal information, by opening contacting us at info@thedatacademy.com. </p>

----!>