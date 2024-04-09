from django.shortcuts import render
import spacy
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from fuzzywuzzy import fuzz
from .expected_answers import EXPECTED_ANSWERS

def page_14(request):
    context ={}
    return render(request, "mywebApp/page_14.php")

def grade3_pretest(request):
    context ={}
    return render(request, "mywebApp/grade3_pretest.php")

def grade3_questionaires(request):
    context ={}
    return render(request, "mywebApp/grade3_questionaires.php")
def grade3_questionaires2(request):
    context ={}
    return render(request, "mywebApp/grade3_questionaires2.php")
def summary_3 (request):
    context ={}
    return render(request, "mywebApp/summary_3.php")
def grade4_pretest(request):
    context ={}
    return render(request, "mywebApp/grade4_pretest.php")
def grade4_questionnaires(request):
    context ={}
    return render(request, "mywebApp/grade4_questionnaires.php")
def grade4_questionnaires2(request):
    context ={}
    return render(request, "mywebApp/grade4_questionnaires2.php")
def grade4_questionnaires3(request):
    context ={}
    return render(request, "mywebApp/grade4_questionnaires3.php")
def summary_4 (request):
    context ={}
    return render(request, "mywebApp/summary_4.php")
def grade2_posttest(request):
    context ={}
    return render(request, "mywebApp/grade2_posttest.php")
def grade2_questionnaires(request):
    context ={}
    return render(request, "mywebApp/grade2_questionnaires.php")
def grade2_questionnaires2(request):
    context ={}
    return render(request, "mywebApp/grade2_questionnaires2.php")
def summary_2 (request):
    context ={}
    return render(request, "mywebApp/summary_2.php")

# Load SpaCy model
# Load SpaCy model
nlp = spacy.load('en_core_web_md')



@csrf_exempt
def analyze_similarity(request):
    if request.method == "POST":
        try:
            user_answers = {
                "answ1": request.POST.get("answ1", "").strip().lower(),
                "answ2": request.POST.get("answ2", "").strip().lower(),
                "answ3": request.POST.get("answ3", "").strip().lower(),
                "answ4": request.POST.get("answ4", "").strip().lower(),
                "answ5": request.POST.get("answ5", "").strip().lower(),
                "answ6": request.POST.get("answ6", "").strip().lower(),
                "answ7": request.POST.get("answ7", "").strip().lower(),
                "grade_level": request.POST.get("grade_level", ""),
            }

            print("Received answers:", user_answers)

            expected_answers = EXPECTED_ANSWERS.get(user_answers["grade_level"], {})

            if not expected_answers:
                return JsonResponse({"error": "Invalid grade level"})

            comparison_results = {}

            for key, expected_answer in expected_answers.items():
                user_answer = user_answers.get(key, "").strip().lower()

                if not user_answer:
                    comparison_results[key] = {
                        "user_answer": "",
                        "expected_answer": expected_answer,
                        "result": "No answer provided",
                    }
                else:
                    if user_answers["grade_level"] in ["grade_2", "grade_3"]:
                        # Grade 2 and 3: Literal is answ1-3, Interpretative is answ4, Applied is answ5
                        if key.startswith("answ1") or key.startswith("answ2") or key.startswith("answ3"):
                            max_similarity = 0
                            for item in expected_answer:
                                if item.strip():
                                    for expected_item in item.split(','):
                                        expected_doc = nlp(expected_item.lower())
                                        user_doc = nlp(user_answer)

                                        word_embeddings_similarity = user_doc.similarity(expected_doc)
                                        tokenization_ratio = fuzz.token_sort_ratio(user_answer, expected_item.lower()) / 100.0
                                        jaccard_similarity = calculate_jaccard_similarity(user_answer, expected_item.lower())
                                        pos_tag_similarity = calculate_pos_similarity(user_doc, expected_doc)

                                        combined_similarity = (
                                            0.5 * word_embeddings_similarity
                                            + 0.3 * tokenization_ratio
                                            + 0.1 * jaccard_similarity
                                            + 0.1 * pos_tag_similarity
                                        )

                                        print(f"Metrics for {key}:")
                                        print(f"Word Embeddings Similarity: {word_embeddings_similarity}")
                                        print(f"Tokenization Ratio: {tokenization_ratio}")
                                        print(f"Jaccard Similarity: {jaccard_similarity}")
                                        print(f"POS Tagging Similarity: {pos_tag_similarity}")
                                        print(f"Combined Similarity: {combined_similarity}")

                                        if combined_similarity > max_similarity:
                                            max_similarity = combined_similarity

                            result = "Correct" if max_similarity >= 0.7 else "Incorrect"

                            comparison_results[key] = {
                                "user_answer": user_answer,
                                "expected_answer": ', '.join(expected_answer),
                                "result": result,
                            }
                        elif key.startswith("answ4"):
                            expected_doc = nlp(','.join(expected_answer).lower())
                            user_doc = nlp(user_answer)

                            word_embeddings_similarity = user_doc.similarity(expected_doc)
                            tokenization_ratio = fuzz.token_sort_ratio(user_answer, ','.join(expected_answer).lower()) / 100.0
                            contextual_embeddings_similarity = user_doc.similarity(expected_doc)


                            combined_similarity = (
                                0.4 * tokenization_ratio +
                                0.3 * word_embeddings_similarity +
                                0.3 * contextual_embeddings_similarity
                            )

                            print(f"Metrics for {key}:")
                            print(f"Answer: {user_answer}")
                            print(f"Word Embeddings Similarity: {word_embeddings_similarity}")
                            print(f"Tokenization Ratio: {tokenization_ratio}")
                            print(f"Combined Similarity: {combined_similarity}")

                            result = "Correct" if combined_similarity >= 0.7 else "Incorrect"

                            comparison_results[key] = {
                                "user_answer": user_answer,
                                "expected_answer": ', '.join(expected_answer),
                                "result": result,
                            }
                        elif key.startswith("answ5"):
                            expected_doc = nlp(','.join(expected_answer).lower())
                            user_doc = nlp(user_answer)

                            word_embeddings_similarity = user_doc.similarity(expected_doc)
                            pos_tag_similarity = calculate_pos_similarity(user_doc, expected_doc)
                            tokenization_ratio = fuzz.token_sort_ratio(user_answer, ','.join(expected_answer).lower()) / 100.0
                            contextual_embeddings_similarity = user_doc.similarity(expected_doc)
                            exact_match = user_answer.replace(".", "").lower() == expected_doc.text.replace(".", "").lower()

                            if any(expected.lower() in user_answer.lower() for expected in expected_answer) or exact_match:
                                combined_similarity = 1.0
                            else:
                                combined_similarity = (
                                    0.5 * contextual_embeddings_similarity
                                    + 0.4 * word_embeddings_similarity
                                    + 0.05 * pos_tag_similarity
                                    + 0.05 * tokenization_ratio
                                    )

                            print(f"Metrics for {key}:")
                            print(f"Answer: {user_answer}")
                            print(f"Word Embeddings Similarity: {word_embeddings_similarity}")
                            print(f"POS Tagging Similarity: {pos_tag_similarity}")
                            print(f"Tokenization Ratio: {tokenization_ratio}")
                            print(f"Combined Similarity: {combined_similarity}")

                            result = "Correct" if combined_similarity >= 0.7 else "Incorrect"

                            comparison_results[key] = {
                                "user_answer": user_answer,
                                "expected_answer": ', '.join(expected_answer),
                                "result": result,
                            }
                            
                    elif user_answers["grade_level"] == "grade_4":
                        # Grade 4: Literal is answ1-3, Interpretative is answ4-5, Applied is answ6-7
                        
                        #Literal
                        if key.startswith("answ1") or key.startswith("answ2") or key.startswith("answ3"):
                            max_similarity = 0
                            for item in expected_answer:
                                if item.strip():
                                    for expected_item in item.split(','):
                                        expected_doc = nlp(expected_item.lower())
                                        user_doc = nlp(user_answer)

                                        word_embeddings_similarity = user_doc.similarity(expected_doc)
                                        tokenization_ratio = fuzz.token_sort_ratio(user_answer, expected_item.lower()) / 100.0
                                        jaccard_similarity = calculate_jaccard_similarity(user_answer, expected_item.lower())
                                        pos_tag_similarity = calculate_pos_similarity(user_doc, expected_doc)

                                        combined_similarity = (
                                            0.5 * word_embeddings_similarity
                                            + 0.3 * tokenization_ratio
                                            + 0.1 * jaccard_similarity
                                            + 0.1 * pos_tag_similarity
                                        )

                                        print(f"Metrics for {key}:")
                                        print(f"Word Embeddings Similarity: {word_embeddings_similarity}")
                                        print(f"Tokenization Ratio: {tokenization_ratio}")
                                        print(f"Jaccard Similarity: {jaccard_similarity}")
                                        print(f"POS Tagging Similarity: {pos_tag_similarity}")
                                        print(f"Combined Similarity: {combined_similarity}")

                                        if combined_similarity > max_similarity:
                                            max_similarity = combined_similarity

                            result = "Correct" if max_similarity >= 0.7 else "Incorrect"

                            comparison_results[key] = {
                                "user_answer": user_answer,
                                "expected_answer": ', '.join(expected_answer),
                                "result": result,
                            }
                        #Interpretative
                        elif key.startswith("answ4") or key.startswith("answ5"):
                            expected_doc = nlp(','.join(expected_answer).lower())
                            user_doc = nlp(user_answer)

                            word_embeddings_similarity = user_doc.similarity(expected_doc)
                            tokenization_ratio = fuzz.token_sort_ratio(user_answer, ','.join(expected_answer).lower()) / 100.0
                            contextual_embeddings_similarity = user_doc.similarity(expected_doc)


                            combined_similarity = (
                                0.4 * tokenization_ratio +
                                0.3 * word_embeddings_similarity +
                                0.3 * contextual_embeddings_similarity
                            )

                            print(f"Metrics for {key}:")
                            print(f"Answer: {user_answer}")
                            print(f"Word Embeddings Similarity: {word_embeddings_similarity}")
                            print(f"Tokenization Ratio: {tokenization_ratio}")
                            print(f"Combined Similarity: {combined_similarity}")

                            result = "Correct" if combined_similarity >= 0.7 else "Incorrect"

                            comparison_results[key] = {
                                "user_answer": user_answer,
                                "expected_answer": ', '.join(expected_answer),
                                "result": result,
                            }

                        #Applied
                        elif key.startswith("answ6") or key.startswith("answ7"):
                            expected_doc = nlp(','.join(expected_answer).lower())
                            user_doc = nlp(user_answer)

                            word_embeddings_similarity = user_doc.similarity(expected_doc)
                           
                            pos_tag_similarity = calculate_pos_similarity(user_doc, expected_doc)
                            tokenization_ratio = fuzz.token_sort_ratio(user_answer, ','.join(expected_answer).lower()) / 100.0
                            contextual_embeddings_similarity = user_doc.similarity(expected_doc)
                            exact_match = user_answer.replace(".", "").lower() == expected_doc.text.replace(".", "").lower()

                            if any(expected.lower() in user_answer.lower() for expected in expected_answer) or exact_match:
                                combined_similarity = 1.0
                            combined_similarity = (
                                0.5 * contextual_embeddings_similarity
                                + 0.4 * word_embeddings_similarity
                                + 0.05 * pos_tag_similarity
                                + 0.05 * tokenization_ratio
                                
                            )

                            print(f"Metrics for {key}:")
                            print(f"Word Embeddings Similarity: {word_embeddings_similarity}")
                            print(f"Contextual Embeddings Similarity: {contextual_embeddings_similarity}")
                            print(f"POS Tagging Similarity: {pos_tag_similarity}")
                            print(f"Tokenization Ratio: {tokenization_ratio}")
                            print(f"Combined Similarity: {combined_similarity}")

                            result = "Correct" if combined_similarity >= 0.7 else "Incorrect"

                            comparison_results[key] = {
                                "user_answer": user_answer,
                                "expected_answer": ', '.join(expected_answer),
                                "result": result,
                            }
                    else:
                        # For other grade levels, use the existing logic
                        max_similarity = 0
                        for item in expected_answer:
                            if item.strip():
                                for expected_item in item.split(','):
                                    expected_doc = nlp(expected_item.lower())
                                    user_doc = nlp(user_answer)

                                    word_embeddings_similarity = user_doc.similarity(expected_doc)
                            pos_tag_similarity = calculate_pos_similarity(user_doc, expected_doc)
                            tokenization_ratio = fuzz.token_sort_ratio(user_answer, ','.join(expected_answer).lower()) / 100.0
                            contextual_embeddings_similarity = user_doc.similarity(expected_doc)
                            exact_match = user_answer.replace(".", "").lower() == expected_doc.text.replace(".", "").lower()

                            if any(expected.lower() in user_answer.lower() for expected in expected_answer) or exact_match:
                                combined_similarity = 1.0
                            else:
                                combined_similarity = (
                                    0.3 * word_embeddings_similarity
                                    + 0.2 * pos_tag_similarity
                                    + 0.2 * tokenization_ratio
                                    + 0.3 * contextual_embeddings_similarity
                                    )

                            print(f"Metrics for {key}:")
                            print(f"Answer: {user_answer}")
                            print(f"Word Embeddings Similarity: {word_embeddings_similarity}")
                            print(f"POS Tagging Similarity: {pos_tag_similarity}")
                            print(f"Tokenization Ratio: {tokenization_ratio}")
                            print(f"Combined Similarity: {combined_similarity}")

                            result = "Correct" if combined_similarity >= 0.7 else "Incorrect"

                            comparison_results[key] = {
                                "user_answer": user_answer,
                                "expected_answer": ', '.join(expected_answer),
                                "result": result,
                            }

            # Calculate category and total scores
            total_score, category_scores = calculate_total_score(comparison_results, user_answers["grade_level"])

            # Prepare the category scores data
            category_scores_data = {
                "literal": {
                    "score": total_score["literal"],
                    "correct": sum(1 for result in category_scores["literal"] if result == "Correct"),
                    "total": len(category_scores["literal"]),
                },
                "interpretative": {
                    "score": total_score["interpretative"],
                    "correct": sum(1 for result in category_scores["interpretative"] if result == "Correct"),
                    "total": len(category_scores["interpretative"]),
                },
                "applied": {
                    "score": total_score["applied"],
                    "correct": sum(1 for result in category_scores["applied"] if result == "Correct"),
                    "total": len(category_scores["applied"]),
                },
            }

            # Now we have all the data, return the JSON response
            return JsonResponse(
                {
                    "results": comparison_results,
                    "total_score": total_score,
                    "category_scores": category_scores_data,
                }
            )

        except Exception as e:
            print("Error:", e)
            return JsonResponse({"error": str(e)}, status=500)

    return JsonResponse({"error": "Invalid request method"}, status=405)

def calculate_total_score(comparison_results, grade_level):
    category_scores = {
        'literal': [],
        'interpretative': [],
        'applied': []
    }

    for key, result in comparison_results.items():
        if grade_level == 'grade_3':
            if key in ['answ1', 'answ2', 'answ3']:
                category_scores['literal'].append(result['result'])
            elif key == 'answ4':
                category_scores['interpretative'].append(result['result'])
            elif key == 'answ5':
                category_scores['applied'].append(result['result'])
        elif grade_level == 'grade_4':
            if key in ['answ1', 'answ2', 'answ3']:
                category_scores['literal'].append(result['result'])
            elif key in ['answ4', 'answ5']:
                category_scores['interpretative'].append(result['result'])
            elif key in ['answ6', 'answ7']:
                category_scores['applied'].append(result['result'])
        elif grade_level == 'grade_2':
            if key in ['answ1', 'answ2', 'answ3']:
                category_scores['literal'].append(result['result'])
            elif key == 'answ4':
                category_scores['interpretative'].append(result['result'])
            elif key == 'answ5':
                category_scores['applied'].append(result['result'])

    total_score = {
        'literal': calculate_category_score(category_scores['literal']),
        'interpretative': calculate_category_score(category_scores['interpretative']),
        'applied': calculate_category_score(category_scores['applied'])
    }

    return total_score, category_scores

def calculate_category_score(category_results):
    total_correct = sum(1 for result in category_results if result == 'Correct')
    total_questions = len(category_results)
    category_score = (total_correct / total_questions) * 100 if total_questions > 0 else 0
    return category_score

def calculate_pos_similarity(doc1, doc2):
    pos_tags1 = set([token.pos_ for token in doc1])
    pos_tags2 = set([token.pos_ for token in doc2])

    common_pos_tags = pos_tags1.intersection(pos_tags2)
    jaccard_similarity = len(common_pos_tags) / (len(pos_tags1.union(pos_tags2)) or 1)

    return jaccard_similarity

def calculate_stop_words_similarity(doc1, doc2):
    stop_words1 = set([token.text.lower() for token in doc1 if token.is_stop])
    stop_words2 = set([token.text.lower() for token in doc2 if token.is_stop])

    common_stop_words = stop_words1.intersection(stop_words2)
    jaccard_similarity = len(common_stop_words) / (len(stop_words1.union(stop_words2)) or 1)

    return jaccard_similarity

def calculate_jaccard_similarity(user_answer, expected_answer):
    user_words = set(user_answer.split())
    expected_words = set(expected_answer.split())

    if len(user_words.union(expected_words)) == 0:
        return 0.0

    return len(user_words.intersection(expected_words)) / len(user_words.union(expected_words))


def preprocess_string(text):
    # Remove specific characters like "." before comparison
    return text.replace(".", "").lower()