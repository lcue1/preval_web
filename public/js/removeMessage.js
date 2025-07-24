function removeMessage(element, delay = 1500) {
    if (element && element.parentNode) {
        setTimeout(() => {
            element.parentNode.removeChild(element);
            console.log("Message removed successfully.");
        }, delay);
    }
}