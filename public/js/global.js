/**
* Retorna json object
* @param {string} x - json string or json object
*/
var toJson = (x) => {

    let json = {}

    if (x !== '' && x !== null) {
        try {
            json = JSON.parse(x)
        } catch (e) {
            json = x
        }
    }
    return json
}