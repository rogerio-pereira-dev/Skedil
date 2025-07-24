# 📌 Feature: [FEATURE NAME]

- **ID:** SKEDIL-XXXX  
- **Created On:** [YYYY-MM-DD]  
- **Status:** [Backlog | In Progress | Approved | Completed | Cancelled]  
- **Dependencies:** [List of required features or technical dependencies]  
- **Tags:** [e.g., backend, frontend, mobile, performance, security]

---

## 🧾 Description

Brief description of the feature to be implemented. Explain the goal, the problem it solves, and the value it brings to users or the business.

> Example: "Allow users to edit their profile information directly via the web interface."

---

## 🛠️ Development Steps

Describe the expected technical steps to implement this feature. Maintain separation of concerns and logical order.

1. **Models & Migrations:**  
   - Create/modify tables, fields, and relationships as needed.

2. **Services / Business Logic:**  
   - Create or update service classes, jobs, handlers, etc.

3. **Interface (if applicable):**  
   - Add or modify frontend components, routes, etc.

4. **APIs:**  
   - Create/edit REST or GraphQL endpoints.

5. **Scheduling / Background Jobs (if necessary):**  
   - Create related commands, jobs, or schedulers.

6. **Logging & Monitoring:**  
   - Add relevant logs and metrics.

---

## ✅ Acceptance Criteria

List objective criteria that indicate the feature is ready for delivery.

- [ ] The feature meets the proposed use case.
- [ ] No visible side effects in other system areas.
- [ ] [Another relevant criterion]
- [ ] Passes all automated tests.
- [ ] [Additional field if necessary]

---

## 🧪 Testing

### Unit Tests

- [ ] Functions or services tested with a minimum of XX% coverage.
- [ ] Tests for both success and failure cases.

### Integration Tests

- [ ] Validate integration between layers (e.g., controller + service).
- [ ] Verify integration with external services, if applicable.

### E2E / Functional Tests

- [ ] Simulate the complete user flow.
- [ ] Ensure expected behavior across different browsers/devices (if applicable).

---

## 💬 Example Payload / Flow (if applicable)

```json
{
  "example_parameter": "value",
  "another": 123
}
```

> Describe what each field represents, if necessary.

---

## 🧭 Technical Notes

- Key considerations, constraints, or relevant technical decisions.
- Future considerations for extension or refactoring.
- Links to related documentation or internal RFCs.

---

## 📎 Attachments & References

- [Link to mockup / Figma / prototype]
- [Related RFC, if any]
- [Issue or problem history]
- [Pre-merge review checklist]
