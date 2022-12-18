import fs from 'fs/promises';
import cheerio from 'cheerio';

const json = []

for (var page = 1; page < 9; page++) {
    const url = `http://vps-a47222b1.vps.ovh.net:8484/product/page/${page}`;
    const response = await fetch(url)
    const data = await response.text();

    const $ = cheerio.load(data)

    $(".card", data).each(function () {

        const jsonData = {
            id: json.length + 1,
            name: $(this).children(".card-body").children("H5").text().split(" - ")[0],
            price: $(this).children(".card-body").children("H5").text().split(" - ")[1],
            tag: $(this).children(".card-body").children("span").text(),
            token: $(this).children(".card-body").children("a").attr("href").replace("/product/", ""),
            url: $(this).children("img").attr("src")
        }

        json.push(jsonData)
    })

}


data()


async function data() {
    const json2 = []
    for (const elem of json) {
        const id = elem["id"]
        const token = elem["token"]
        const name = elem["name"]
        const price = elem["price"]
        const tag = elem["tag"]
        const urls = elem["url"]

        const url = `http://vps-a47222b1.vps.ovh.net:8484/product/${token}`;
        const response = await fetch(url)
        const data = await response.text();

        const $ = cheerio.load(json)

        $(".p-1", data).each(function () {
            const jsonData = {
                id: id,
                name: name,
                price: price,
                tag: tag,
                token: token,
                url: urls,
                description: $(this).children("p").text()
            }

            json2.push(jsonData)
        })
    }
    await fs.writeFile("../data.json", JSON.stringify(json2))
}



