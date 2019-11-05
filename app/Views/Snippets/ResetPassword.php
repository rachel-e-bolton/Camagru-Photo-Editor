<div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Reset my Password...</p>
    </header>
    <section class="modal-card-body">
    <form id="reset-password-form">
        <div class="reset-password-fields">
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
    <footer class="modal-card-foot is-vcentered">
        <button id="send-reset-link" class="button is-primary">Send Link</button>
    </footer>
  </div>