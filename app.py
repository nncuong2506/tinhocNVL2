from flask import Flask, render_template, request, jsonify
from flask_cors import CORS
from chat import get_response
import nltk
import os

# --- Cấu hình NLTK ---
NLTK_PATH = os.path.join(os.getcwd(), "nltk_data")
os.makedirs(NLTK_PATH, exist_ok=True)
nltk.data.path.append(NLTK_PATH)

try:
    nltk.data.find('tokenizers/punkt_tab')
except LookupError:
    nltk.download('punkt_tab', download_dir=NLTK_PATH)
try:
    nltk.data.find('tokenizers/punkt')
except LookupError:
    nltk.download('punkt', download_dir=NLTK_PATH)

# --- Flask App ---
app = Flask(__name__)
CORS(app, resources={r"/*": {"origins": "*"}})

@app.route("/")
def index():
    return "Flask Chatbot API đang chạy trên Render!"

@app.route("/predict", methods=["POST"])
def predict():
    data = request.get_json()
    text = data.get("message", "")
    selected_product = data.get("selected_product", "")

    if selected_product:
        response = f"Bạn đã chọn: {selected_product}"
    else:
        response = get_response(text)

    return jsonify({"answer": response})

if __name__ == "__main__":
    port = int(os.environ.get("PORT", 5000))
    app.run(host='0.0.0.0', port=port)
