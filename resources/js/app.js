import "./bootstrap";
import domtoimage from "dom-to-image";

export function convertElementToImage() {
    const elementToConvert = document.getElementById("elementToCopy");

    domtoimage
        .toPng(elementToConvert)
        .then(function (dataUrl) {
            console.log(dataUrl);
        })
        .catch(function (error) {
            console.error("Error:", error);
        });
}
