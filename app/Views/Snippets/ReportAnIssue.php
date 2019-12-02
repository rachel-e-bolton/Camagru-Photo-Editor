<div class="modal-card">
 
        <header class="modal-card-head">
            <p class="modal-card-title is-family-primary">Report an Issue</p>
            <!-- <div class="field is-grouped is-hidden-desktop">
            <div class="control">
                <button id="submit" class="button is-link">Submit</button>
            </div>
            </div> -->
        </header>
        <!-- <form id="issue-form"> -->
        <section class="modal-card-body is-family-secondary">
        
            <div class="field">
            <label class="label">Name and Surname</label>
            <div class="control">
                <input class="input"
                        name="name"
                        id="name" 
                        required 
                        type="text" 
                        placeholder="Your Name and Surname here..." 
                        minlength="10" 
                        maxlength="60"
                        value="<?= $user["first_name"] ?> <?= $user["last_name"] ?>">
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
                                    id="handle" 
                                    value="<?= $user["handle"] ?>" 
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
                        required 
                        type="email" 
                        value="<?= $user["email"] ?>" 
                        placeholder="eg. hello@general.co.za">
            </div>
            </div>

            <div class="field">
            <label class="label">Subject</label>
            <div class="control level">
                <div class="select level-item">
                <select class="input" name="subject-prefix" id="subject" required type="select">
                    <option>Issue Area</option>
                    <option>User Account Issue</option>
                    <option>Gallery Issue</option>
                    <option>Add Post Issue</option>
                    <option>General Issue</option>
                </select>
                </div>
                <!-- <input class="input level-item" 
                        name="subject-suffix" 
                        id="subject-suffix" 
                        required type="text" 
                        placeholder="Short description here..." 
                        minlength="10" 
                        maxlength="60" 
                        style="width: 60%; margin-left: .75rem;"> -->
            </div>
            </div>

            <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" 
                            name="message" 
                            id="message" 
                            placeholder="Detailed description here... (OPTIONAL - Maximum 600 Characters)" 
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

            <!-- <div class="field">
            <label class="label">Email me a Copy of this Message</label>
            <div class="control">
                <label class="radio">
                <input type="radio" id="copy_mail" name="question" checked="checked">
                Yes
                </label>
                <label class="radio">
                <input type="radio" name="question">
                No
                </label>
            </div>
            </div> -->
            <input type="hidden" id="type" name="type" value="issue">

        </section>
        <footer class="modal-card-foot">
            <div class="field is-grouped">
                <div class="control">
                    <button onclick="send_mail()" id="submit" class="button is-link">Submit</button>
                </div>
            </div>
        </footer>
        <!-- </form> -->
</div>-