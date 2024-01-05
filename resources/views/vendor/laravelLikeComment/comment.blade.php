<?php
$GLOBALS['commentDisabled'] = "";
if(!Auth::check())
    $GLOBALS['commentDisabled'] = "";
$GLOBALS['commentClass'] = -1;
?>
<div class="laravelComment" id="laravelComment-{{ $comment_item_id }}">
    <h3 class="ui dividing header block-country-weather__heading js-heading mb-5">{{ __('Comments') }}</h3>
    <div class="ui threaded comments" id="{{ $comment_item_id }}-comment-0">
        <button class="button-outline button-outline--inverted block-featured-story__button mb-5" id="write-comment" data-form="#{{ $comment_item_id }}-comment-form">
            <span class="button-outline__label js-label">
                {{ __('Comments Write') }}
            </span>
        </button>
        <form class="ui laravelComment-form form block-newsletter__form js-form mb-10" id="{{ $comment_item_id }}-comment-form" data-parent="0" data-item="{{ $comment_item_id }}" style="display: none;">
            <div class="form-enquiry__input js-text-area input-container">
                <textarea id="0-textarea" class="input input-textarea js-input" {{ $GLOBALS['commentDisabled'] }} placeholder="{{ __('Comments Placeholder') }}" rows="3" required></textarea>
                <label class="input-label" for="interests">{{ __('Comments Label') }}</label>
            </div>
            <button type="submit" class="button-outline button-outline--inverted block-featured-story__button mt-3" {{ $GLOBALS['commentDisabled'] }}>
                <span class="button-outline__label js-label">
                    {{ __('Send') }}
                </span>
            </button>
        </form>
<?php
$GLOBALS['commentVisit'] = array();

function dfs($comments, $comment){
    $GLOBALS['commentVisit'][$comment->id] = 1;
    $GLOBALS['commentClass']++;
?>
    <div class="comment show-{{ $comment->item_id }}-{{ (int)($GLOBALS['commentClass'] / 5) }}" id="comment-{{ $comment->id }}">
        <a class="avatar">
            <img src="{{ $comment->avatar }}">
        </a>
        <div class="content">
            <div class="flex align-middle justify-center">
                <a class="author" url="{{ $comment->url or '' }}"> {{ $comment->name }} </a>
                <svg class="list-seasons__divider" width="5" height="32" viewBox="0 0 5 32" xmlns="http://www.w3.org/2000/svg"><g transform="rotate(-180 2.25 16)" fill="none" fill-rule="evenodd"><path stroke="#FC6220" stroke-dasharray="2,4" d="M2 0v32"></path><circle fill="#FC6220" cx="2" cy="16" r="2"></circle></g></svg>
                <div class="metadata">
                    <span class="date">{{ $comment->updated_at->diffForHumans() }}</span>
                </div>
            </div> <br>
            <a href="#" class="button-arrow button-arrow--inverted button-arrow--reversed story__button {{ $GLOBALS['commentDisabled'] }} reply reply-button" data-toggle="{{ $comment->id }}-reply-form">
                <span class="button-arrow__label">{{ __('Reply') }}<span class="button-arrow__icon"></span>
                </span>
                <span class="button-arrow__line"></span>
                <div class="text text-left text-xs">
                    {{ $comment->comment }}
                </div>
            </a>
            <br>
            {{ \risul\LaravelLikeComment\Controllers\CommentController::viewLike('comment-'.$comment->id) }}
            <form id="{{ $comment->id }}-reply-form" class="ui laravelComment-form form block-newsletter__form js-form mb-10" data-parent="{{ $comment->id }}" data-item="{{ $comment->item_id }}" style="display: none;">
                <div class="form-enquiry__input js-text-area input-container">
                    <textarea id="{{ $comment->id }}-textarea" class="input input-textarea js-input" {{ $GLOBALS['commentDisabled'] }} placeholder="{{ __('Comments Placeholder') }}" rows="3" required></textarea>
                    <label class="input-label" for="interests">{{ __('Reply') }}</label>
                </div>
                <button type="submit" class="button-outline button-outline--inverted block-featured-story__button mt-3" {{ $GLOBALS['commentDisabled'] }}>
                    <span class="button-outline__label js-label">
                        {{ __('Send') }}
                    </span>
                </button>
            </form>
        </div>
        <div class="comments" id="{{ $comment->item_id }}-comment-{{ $comment->id }}">
<?php
    $i = 0;
    foreach ($comments as $child) {
        if($child->parent_id == $comment->id && !isset($GLOBALS['commentVisit'][$child->id])){
            dfs($comments, $child);
        }
    }
    echo "</div>";
    echo "</div>";
}

$comments = \risul\LaravelLikeComment\Controllers\CommentController::getComments($comment_item_id);
foreach ($comments as $comment) {
    if(!isset($GLOBALS['commentVisit'][$comment->id])){
        dfs($comments, $comment);
    }
}
?>
    </div>
    <button class="button-outline button-outline--inverted block-featured-story__button" id="showComment" data-show-comment="0" data-item-id="{{ $comment_item_id }}">
        <span class="button-outline__label js-label">
            {{ __('Show Comments') }}
        </span>
    </button>
</div>
