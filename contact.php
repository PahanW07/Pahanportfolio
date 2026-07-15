<?php include('includes/header.php'); ?>

<section class="page-hero">

    <div class="hero-content">

        <span class="section-tag">CONTACT</span>

        <h1>Let’s Talk</h1>

        <p>
            Have a project in mind? Let’s create something powerful together.
        </p>

    </div>

</section>

<section class="contact-page">

    <div class="contact-container">

        <!-- FORM -->
        <div class="contact-form">

            <h2>Send a Message</h2>

            <form action="send-message.php" method="POST">

                <input type="text" name="name" placeholder="Your Name" required>

                <input type="email" name="email" placeholder="Your Email" required>

                <input type="text" name="subject" placeholder="Subject">

                <textarea name="message" placeholder="Your Message" rows="6" required></textarea>

                <button type="submit" class="btn-primary">
                    Send Message
                </button>

            </form>

        </div>

        <!-- INFO -->
        <div class="contact-info">

            <h2>Contact Info</h2>

            <p><strong>Phone:</strong> +94 77 375 1447</p>
            <p><strong>Email:</strong> info@nawalawedagedara.lk</p>
            <p><strong>Location:</strong> Sri Lanka</p>

            <div class="contact-buttons">

                <a href="https://wa.me/94773751447" class="btn-primary">
                    WhatsApp Me
                </a>

                <a href="mailto:info@yourmail.com" class="btn-secondary">
                    Email Me
                </a>

            </div>

        </div>

    </div>

</section>

<?php include('includes/footer.php'); ?>
