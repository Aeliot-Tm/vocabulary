<script id="words-tpl" type="text/ractive">
@{{#each items:i}}
    <div class="word-bl clearfix">
        <form method="post" action="{{ route('word-new') }}" class="word-form" on-submit="saveWord">
            <div class="row pair">
                <div class="col-md-6 definition">
                    <div class="form-group word">
                        <label for="word-@{{id}}-definition"
                               class="control-label">Definition</label>
                        <input type="text" name="en" id="word-@{{id}}-definition"
                               class="form-control"
                               value="@{{en}}">
                    </div>
                    <div class="form-group description">
                        <label for="word-@{{id}}-definition-description"
                               class="control-label">Description</label>
                        <textarea name="en_description"
                                  class="form-control"
                                  id="word-@{{id}}-definition-description"
                        >@{{en_description}}</textarea>
                    </div>
                    <div class="actions"></div>
                </div>
                <div class="col-md-6 translation">
                    <div class="form-group word">
                        <label for="word-@{{id}}-translation"
                               class="control-label">Translation</label>
                        <input type="text" name="ru" id="word-@{{id}}-translation"
                               class="form-control"
                               value="@{{ru}}">
                    </div>
                    <div class="form-group description">
                        <label for="word-@{{id}}-translation-description"
                               class="control-label">Description</label>
                        <textarea name="ru_description"
                                  class="form-control"
                                  id="word-@{{id}}-translation-description"
                        >@{{ru_description}}</textarea>
                    </div>
                    <div class="actions"></div>
                </div>
            </div>
            <div class="word-actions">
                {{-- TODO do url-encode before using in URL --}}
                {{-- TODO add yandex.translate.ru --}}
                <a href="https://translate.google.by/#en/ru/@{{en}}" target="_blank" class="g-translate"></a>
                <button type="submit" class="btn btn-xs btn-default">Save</button>
                <button type="reset" class="btn btn-xs btn-default">Cancel</button>
            </div>
        </form>
    </div>
@{{/each}}
</script>
