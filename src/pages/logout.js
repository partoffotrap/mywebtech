import Auth from "../../../../../../../../Downloads/web-technologies-2022-2-lesson15/web-technologies-2022-2-lesson15/src/services/auth.js";
import location from "../../../../../../../../Downloads/web-technologies-2022-2-lesson15/web-technologies-2022-2-lesson15/src/services/location.js";
import loading from "../../../../../../../../Downloads/web-technologies-2022-2-lesson15/web-technologies-2022-2-lesson15/src/services/loading.js";

const init = async () => {
    const response = await Auth.logout()
    location.index()
}

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", init)
} else {
    init()
}
