export default async function handler(req, res) {
  try {
    // Get client IP
    const ip =
      req.headers["x-forwarded-for"]?.split(",")[0] ||
      req.socket.remoteAddress;

    // If localhost (during dev)
    if (ip === "::1" || ip === "127.0.0.1") {
      return res.status(200).json({
        ip,
        city: "Localhost",
        region: "",
        country: ""
      });
    }

    const response = await fetch(`http://ip-api.com/json/${ip}`);
    const data = await response.json();
    console.log(data);

    res.status(200).json({
      ip,
      city: data.city || "",
      region: data.regionName || "",
      country: data.country || ""
    });
  } catch (error) {
    res.status(500).json({ error: "Location fetch failed" });
  }
}
