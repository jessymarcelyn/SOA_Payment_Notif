<?php
session_start();
require "connect.php";
include "header.php"
?>

<body>
    <div class="bg-body-index">
        <div class="container">
            <div class="content">
                <div class="text">
                    <h1 class="display-6 fst-italic">Insurance for A Worry-free Trip</h1>
                    <p class="lead my-3">Stay protected on your travels! Enjoy most of your journey by ensuring that you and your trip are covered against unpredictable events, without the extra hassle</p>
                </div>
                <img src="images/chill.png" alt="Chill Image">
            </div>
        </div>
    </div>
    <div class="container text-center title">
        <div class="title-form">Learn more about our products</div>
    </div>
    <div class="container text-center">
        <div class="content1">
            <div class="card mb-3 custom-card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="button-container">
                        <button class="btn btn-outline-secondary" onclick="window.location.href='travel_insurance.php'">
                            <i class="fa-solid fa-plane-departure fa-xl mb-2" style="color: #1ba0e2;"></i><br>
                            <div class="insurance-title">Travel Insurance</div>
                        </button>
                        <button class="btn btn-outline-secondary" onclick="window.location.href='carInsurance.php'">
                            <i class="fa-solid fa-car fa-xl mb-2" style="color: #1ba0e2;"></i><br>
                            <div class="insurance-title">Car Insurance</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <div class="container">
        <div class="content1">
            <div class="col-md-4">
                <div class="title-form">Official insurance partner</div>
                <p class="partner">We are partnering with trusted and reliable insurance providers to give you the best protection.</p>
            </div>
            <div class="col-md-8">
                <img src="images/official.png" alt="Partnership">
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <div class="container text-center title">
        <div class="title-form">Why choose our insurance?</div>
    </div>
    <div class="container" style="padding-bottom: 30px;">
        <div class="content1">
            <div class="col-md-11 mx-auto justify-content-between"> <!-- Add justify-content-between here -->
                <div class="row align-items-center animated-section">
                    <div class="col-md-4">
                        <img src="images/convenience.png" style="height: 10rem;" alt="convenience">
                    </div>
                    <div class="col-md-8">
                        <p class="partner1">Convenience in Your Hand</p>
                        <p class="partner">Simple and hassle-free submission process. Just follow the step-by-step and you will get your policy in no time.</p>
                    </div>
                </div>
                <div class="row align-items-center animated-section">
                    <div class="col-md-8">
                        <p class="partner1">Secure Transaction Guaranteed</p>
                        <p class="partner">Security and privacy of your online transaction are protected by our authorized technology to guarantee you a peace of mind.</p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <img src="images/secure.png" style="height: 10rem;" alt="secure">
                    </div>
                </div>
                <div class="row align-items-center animated-section">
                    <div class="col-md-4">
                        <img src="images/solution.png" style="height: 10rem;" alt="solution">
                    </div>
                    <div class="col-md-8">
                        <p class="partner1">Solutions for Every Needs</b></p>
                        <p class="partner">Live life with a peace of mind with our various protections options that suits your needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <div class="container text-center title">
        <div class="title-form">How to purchase our insurance?</div>
    </div>
    <div class="container">
        <div class="content1">
            <div class="col-md-9 mx-auto">
                <div class="row align-items-center mb-5 animated-section">
                    <div class="col-md-5">
                        <img src="images/fill.png" style="width: 20rem;" alt="convenience">
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2 mb-5 d-flex justify-content-end">
                                <div class="circle-number">
                                    1
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p class="partner1">Fill in your details</p>
                                <p class="partner">Make sure they are correct to help us provide products and plans for you.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5 animated-section">
                    <div class="col-md-5">
                        <img src="images/select.png" style="width: 20rem;" alt="convenience">
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2 mb-5 d-flex justify-content-end">
                                <div class="circle-number">
                                    2
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p class="partner1">Select your product</p>
                                <p class="partner">Check the available plane ticket or car rental options. Choose one that best suits your needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5 animated-section">
                    <div class="col-md-5">
                        <img src="images/purchase.png" style="width: 20rem;" alt="convenience">
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2 mb-5 d-flex justify-content-end">
                                <div class="circle-number">
                                    3
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p class="partner1">Fill in the purchase form</p>
                                <p class="partner">Fill in the required details and recheck to ensure they are correct before continuing to payment.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5 animated-section">
                    <div class="col-md-5">
                        <img src="images/purchase.png" style="width: 20rem;" alt="convenience">
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2 mb-5 d-flex justify-content-end">
                                <div class="circle-number">
                                    4
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p class="partner1">Select your insurance plan</p>
                                <p class="partner">Read carefully and choose the plan that best suits your needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-5 animated-section">
                    <div class="col-md-5">
                        <img src="images/payment.png" style="width: 20rem;" alt="convenience">
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2 mb-5 d-flex justify-content-end">
                                <div class="circle-number">
                                    5
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p class="partner1">Complete your payment</p>
                                <p class="partner">Select your preferred payment method and complete your payment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="horizontal-line"></div>
    <div class="container text-center title">
        <div class="title-form">Our Insurance: Protection for Every Kind of Journey in Life</div>
    </div>
    <div class="container">
        <div class="content1">
            <div class="col-md-12">
                <p class="partner2">
                    Life is a long-haul journey with plenty of twists and turns. Some are pleasant surprises, some might be 
                    unfortunate. As one of the trusted online travel agents in Indonesia, we strive to provide a smooth and 
                    worry-free journey for our users, not only in travel but also in life. To answer these needs, we offer you 
                    our latest service: <b>Insurance</b> at Our site.
                </p>
                <p class="partner2">
                    We are committed to providing you with protection plans that cover life's many uncertainties and unpredictability, 
                    whether you are at home or away. Put your mind at ease with our insurance products, from <b>Travel Insurance</b> to <b>Car Insurance</b>. 
                </p>
                <p class="partner2">
                    We understand that in this fast-paced and ever-changing world, time is a privilege and trust is priceless. 
                    That is why we simplified our submission process and guaranteed your online transaction security with 
                    cutting-edge authentication technology. 
                </p>
                <p class="partner2">
                    We partnered with the most trusted and reliable insurance partners, such as Sinarmas, Chubb, Astra Life, Adira 
                    Insurance, and MSIG, to give you a much-needed assurance, especially in times of emergency. On top of all that, 
                    with affordable prices and competitive coverage, we ensure that our insurance products are for everyone.
                </p>
                <p class="partner2">
                    Wherever your life journey may lead, enjoy it with peace of mind because Traveloka Insurance is there for you.
                </p>
            </div>
        </div>
    </div>
</div>
<?php 
    include "footer.php"
?>
    <script>
        // Function to check if an element is fully in viewport
        function isFullyInViewport(element) {
            const rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Function to add animation class only when fully in viewport
        function addAnimationForVisibleSections() {
            const sections = document.querySelectorAll('.animated-section');
            sections.forEach(section => {
                if (isFullyInViewport(section) && !section.classList.contains('animate')) {
                    section.classList.add('animate');
                }
            });
        }

        // Initial check when page loads
        addAnimationForVisibleSections();

        // Listen for scroll events to trigger animation
        window.addEventListener('scroll', addAnimationForVisibleSections);
    </script>
</body>