import Choices from "choices.js";

window.choices = (element) => {
    return new Choices(element, {maxItemCount: 4, removeItemButton: true, duplicateItemsAllowed: false});
};
