import pandas as pd
from sklearn.tree import DecisionTreeClassifier
from sklearn.metrics import classification_report, accuracy_score
import joblib

# Create a dummy dataset with three levels of reading comprehension
data = {
    'semantic_similarity': [0.6, 0.7, 0.5, 0.8, 0.4],
    'token_set_ratio': [0.5, 0.6, 0.7, 0.4, 0.8],
    'partial_ratio': [0.4, 0.7, 0.6, 0.5, 0.9],
    'synonym_similarity': [0.6, 0.5, 0.7, 0.4, 0.8],
    'exact_match': [1, 0, 1, 0, 1],
    'reading_comprehension': ['medium', 'low', 'high', 'medium', 'low']  # Three levels: low, medium, high
}

df = pd.DataFrame(data)

# Separate features and target variable
X = df.drop('reading_comprehension', axis=1)
y = df['reading_comprehension']

# Train a Decision Tree classifier
clf = DecisionTreeClassifier(random_state=42)
clf.fit(X, y)

# Make predictions on the training data for demonstration
predictions = clf.predict(X)

# Print classification report and accuracy
print("Classification Report:")
print(classification_report(y, predictions))

print("\nAccuracy:", accuracy_score(y, predictions))

# Save the trained model to a file
joblib.dump(clf, 'trained_model_multi_class.pkl')

print("Model trained and saved successfully!")
