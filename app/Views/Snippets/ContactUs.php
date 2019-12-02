<div class="modal-card">
    <!-- <form id="contact-form"> -->
        <header class="modal-card-head">
            <p class="modal-card-title is-family-primary">Contact Us</p>
        </header>

        <section class="modal-card-body is-family-secondary">
        
            <div class="field">
                <label class="label">Name and Surname</label>
                <div class="control">
                    <input class="input"
                            name="name"
                            id="name" 
                            required 
                            type="text" 
                            minlength="10" 
                            maxlength="60"
                            value="<?= $user["first_name"] ?> <?= $user["last_name"] ?>"
                            placeholder="Your Name and Surname here...">
                </div>
            </div>

            <div class="field">
                <label class="label">Handle</label>
                <div class="field-body">
                    <div class="field has-addons">
                        <p class="control">
                            <a class="button is-static">@</a>
                        </p>
                        <p class="control is-expanded">
                            <input name="handle" 
                                    id="handle" value="<?= 
                                    $user["handle"] ?>" 
                                    class="input" 
                                    type="text" 
                                    placeholder="Optional...">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" 
                        name="email" 
                        id="email" 
                        required type="email" 
                        value="<?= $user["email"] ?>" 
                        placeholder="eg. hello@general.co.za">
            </div>
            </div>

            <div class="field">
            <label class="label">Subject</label>
            <div class="control">
                <input class="input" 
                        name="subject" 
                        id="subject" 
                        required type="text" 
                        placeholder="Subject here..." 
                        minlength="10" 
                        maxlength="60">
            </div>
            </div>

            <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" 
                            name="message" id="message" 
                            required 
                            placeholder="Your message here... (Maximum 600 Characters)" 
                            minlength="10" 
                            maxlength="600"></textarea>
            </div>
            </div>

            <!-- <div class="field">
            <div class="control">
                <label class="checkbox">
                <input type="checkbox">
                I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
            </div> -->
        
            <div class="field">
            <label class="label">Email me a Copy of this Message</label>
            <div class="control">
                <label class="radio">
                <input type="radio" name="question" checked="checked">
                Yes
                </label>
                <label class="radio">
                <input type="radio" name="question">
                No
                </label>
            </div>
            </div>

            
        </section>
        
        <footer class="modal-card-foot">
            <div class="field is-grouped">
                <div class="control">
                    <button onclick="send_mail()" id="submit" class="button is-link">Submit</button>
                </div>
            </div>
        </footer>
    <!-- </form> -->
</div>