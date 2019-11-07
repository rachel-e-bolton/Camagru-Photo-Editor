<div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title has-text-centered">Reset my Password...</p>
    </header>
    <section class="modal-card-body">
    <form id="reset-password-modal">
        <div class="reset-password-modal-fields">
            <div class="field is-horizontal">
                <div class="field-label grow-1 is-normal">
                    <label class="label">Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <p class="control">
                        <input id="email" name="email" class="input" required type="email">
                    </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="errors"></div>
    </form>
    </section>
    <footer class="modal-card-foot">
        <button id="send-reset-link" class="button is-primary" style="margin-left: auto; margin-right: auto;">Send Link</button>
    </footer>
  </div>