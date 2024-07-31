<x-modal-confirm
    livewire-event-to-open-modal="notAsSpamCommentWasSet"
    event-to-close-modal="commentWasNotAsSpam"
    modal-title="Reset Spam Counter"
    modal-description="Are you sure you want to reset the spam counter for this comment?"
    modal-confirm-button-text="Reset"
    wire-click="notAsSpamComment"
/>